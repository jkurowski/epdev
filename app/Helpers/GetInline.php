<?php

if (! function_exists('getInline')) {
    function getInline($array, $id, $element)
    {
        foreach ($array as $a) {
            if ($a['id'] == $id) {
                if ($element === 'file' && !empty($a[$element])) {
                    $path = public_path('uploads/inline/' . $a[$element]);

                    if (file_exists($path)) {
                        $imageInfo = getimagesize($path);

                        return [
                            'src' => 'uploads/inline/' . $a[$element],
                            'file_alt' => $a['file_alt'] ?? '',
                            'width' => $imageInfo[0] ?? null,
                            'height' => $imageInfo[1] ?? null,
                        ];
                    }

                    return null;
                }

                return $a[$element] ?? null;
            }
        }

        return null; // fallback if id not found
    }
}
