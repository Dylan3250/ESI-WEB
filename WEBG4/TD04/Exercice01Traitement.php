<?php
$jours = ["", "lundi", "mardi", "mercredi", "jeudi", "vendredi"];
$hours = ["8h15", "9h15", "10h30", "11h30", "13h45", "14h45", "16h", "17h"];
$horaires = [
    "C111" => [
        ["CPP NVS 003", "ATL APA 404", "", "CPP NVS 003", "ALG NRI 201"],
        ["CPP NVS 003", "ATL APA 404", "", "CPP NVS 003", "ALG NRI 201"],
        ["ANLL CUV 404", "ATL APA 404", "CAI JDS 203", "ANL CUV 003", "CPPL NVS 404"],
        ["ANLL CUV 404", "ATL APA 404", "CAI JDS 203", "ANL CUV 003", "CPPL NVS 404"],
        ["PER CUV 003", "PERL ARO 401", "CAI JDS 203", "ANLL CUV 404", "ALG NRI 201"],
        ["PER CUV 003", "PERL ARO 401", "CAI JDS 203", "ANLL CUV 404", "ALG NRI 201"],
        ["", "", "DRO ART 003", "", ""],
        ["", "", "DRO ART 003", "", ""],
    ],
    "C112" => [
        ["CPP NVS 003", "ATL SRV 401", "", "CPP NVS 003", "ALG NRI 201"],
        ["CPP NVS 003", "ATL SRV 401", "", "CPP NVS 003", "ALG NRI 201"],
        ["ANLL CUV 404", "ATL SRV 401", "CAI JDS 203", "ANL CUV 003", "ANLL SDR 401"],
        ["ANLL CUV 404", "ATL SRV 401", "CAI JDS 203", "ANL CUV 003", "ANLL SDR 401"],
        ["PER CUV 003", "", "CAI JDS 203", "CPPL NVS 401", "ALG NRI 201"],
        ["PER CUV 003", "", "CAI JDS 203", "CPPL NVS 401", "ALG NRI 201"],
        ["PERL CUV 403", "", "DRO ART 003", "", ""],
        ["PERL CUV 403", "", "DRO ART 003", "", ""],
    ],
];
$horaire = $horaires[strtoupper($_POST["group"])];

for ($i = 0; $i < count($horaire); $i++) {
    array_unshift($horaire[$i], $hours[$i]);
}

echo json_encode(array_merge([$jours], $horaire));