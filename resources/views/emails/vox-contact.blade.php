@props([
    'data' => [
        'investment_name' => null,
        'name' => null,
        'email' => null,
        'phone' => null,
        'message' => null,
        'agreements' => [],
    ],
])

@if ($data['investment_name'])
    INWESTYCJA:<br>
    {{ $data['investment_name'] }}
@endif
<br><br>
@if ($data['name'])
    IMIE:<br>
    {{ $data['name'] }}
@endif
<br><br>
@if ($data['email'])
    EMAIL:<br>
    {{ $data['email'] }}
@endif
<br><br>
@if ($data['phone'])
    TELEFON:<br>
    {{ $data['phone'] }}
@endif
<br><br>
@if ($data['message'])
    OPIS:<br>
    {{ $data['message'] }}
@endif
<br><br>
@if (!empty($data['agreements']))
    ZGODY:
    <br>
    @foreach ($data['agreements'] as $item)
        {{ strtoupper(isset($item['title']) ? $item['title'] : 'Brak tytułu') }} &nbsp; ({{ isset($item['description']) ? $item['description'] : 'Brak opisu' }}) <br>
    @endforeach

    ZGODA_MARKETING (Wyrażam zgodę na przetwarzanie przez DANE_SPÓŁKI_I_ADRES_SIEDZIBY, moich danych osobowych zawartych
    w niniejszym formularzu kontaktowym w celu i zakresie koniecznym do realizacji zgłoszenia.)
    ZGODA_MAIL (Wyrażam zgodę na przetwarzanie przez DANE_SPÓŁKI_I_ADRES_SIEDZIBY, moich danych osobowych zawartych w
    niniejszym formularzu kontaktowym w celu przesyłania mi ofert handlowych na produkty własne spółki drogą
    elektroniczną.)
    ZGODA_TEL (Wyrażam zgodę na przetwarzanie przez DANE_SPÓŁKI_I_ADRES_SIEDZIBY, moich danych osobowych zawartych w
    niniejszym formularzu kontaktowym w celu kontaktu telefonicznego ze strony przedstawicieli spółki w sprawach
    związanych z ofertą handlową na produkty własne.)
    ZGODA_OSWIADCZENIE (Administratorem Państwa danych osobowych jest firma DANE_SPÓŁKI_I_ADRES_SIEDZIBY. Dane wpisane w
    formularzu kontaktowym będą przetwarzane w celu udzielenia odpowiedzi na przesłane zapytanie zgodnie z Polityką
    Prywatności.)
    ZGODA_SMS (Wyrażam zgodę na przetwarzanie przez DANE_SPÓŁKI_I_ADRES_SIEDZIBY, moich danych osobowych zawartych w
    niniejszym formularzu kontaktowym w celu przesyłania mi ofert handlowych na produkty własne spółki drogą SMS.)
@endif
