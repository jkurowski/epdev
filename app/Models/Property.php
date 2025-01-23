<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class Property extends Model
{
    use LogsActivity, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'investment_stage',
        'building_id',
        'building_name',
        'floor_id',
        'vox_id',
        'status',
        'name',
        'name_list',
        'number',
        'number_order',
        'type',
        'rooms',
        'area',
        'area_search',
        'price',
        'price_brutto',
        'ask_for_price',
        'garden_area',
        'balcony_area',
        'balcony_area_2',
        'terrace_area',
        'loggia_area',
        'plot_area',
        'parking_space',
        'window',
        'garage',
        'type',
        'html',
        'cords',
        'file',
        'file_pdf',
        'file_webp',
        'meta_title',
        'meta_description',
        'views',
        'active',
        'highlighted',
        'promotion_end_date',
        'promotion_price',
        'client_id',
        'saled_at',
        'reservation_until'
    ];

    /**
     * Get next property
     * @param int $investment
     * @param int $number_order
     * @return Property|null
     */
    public function findNext(int $investment, int $number_order): ?Property
    {
        return $this->where('investment_id', $investment)->where('vox_id', '>', $number_order)->where('status', 1)->first();
    }

    /**
     * Get previous property
     * @param int $investment
     * @param int $number_order
     * @return Property|null
     */
    public function findPrev(int $investment, int $number_order): ?Property
    {
        return $this->where('investment_id', $investment)->where('vox_id', '<', $number_order)->where('status', 1)->first();
    }

    /**
     * Get notifications for room
     * @return HasMany
     */
    public function roomsNotifications(): HasMany
    {
        return $this->hasMany(
            'App\Models\Notification',
            'notifiable_id',
            'id'
        )->where('notifiable_type', 'App\Models\Property')->latest();
    }

    public function getActivitylogOptions(): LogOptions
    {
        $logOptions = new LogOptions();
        $logOptions->useLogName('Powierzchnia');
        $logOptions->logFillable();

        return $logOptions;
    }

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    /**
     * Get the client that owns the property.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function relatedProperties()
    {
        return $this->belongsToMany(Property::class, 'property_property', 'property_id', 'related_property_id');
    }

    public function payments()
    {
        return $this->hasMany(PropertyPayment::class);
    }

    public function nextPaymentAfterToday()
    {
        return $this->payments()
            ->where('due_date', '>', Carbon::today())
            ->orderBy('due_date', 'asc')
            ->first();
    }

    public function investmentPayments()
    {
        return $this->hasManyThrough(InvestmentPayment::class, Investment::class, 'id', 'investment_id', 'investment_id', 'id');
    }

    // Define an accessor for the URL
    public function getUrlAttribute()
    {
        $investmentSlug = $this->investment->slug ?? '';
        return "/inwestycje/i/{$investmentSlug}/pietro/{$this->floor_id}/m/{$this->id}";
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($property) {
            if ($property->isDirty('status') && $property->getOriginal('status') == 2 && $property->status != 2) {
                event('property.status.changed', $property);
            }
        });
    }
}