<?php

$json = '
[
    {"name": "Adon", "email": "adonfatima18@gmail.com", "phone": "012-456-7890"},
    {"name": "Anna", "email": "anna@example.com", "phone": "123-456-7890"},
    {"name": "Brittany", "email": "brittany@example.com", "phone": "123-456-7891"},
    {"name": "Cinderella", "email": "cinderella@example.com", "phone": "123-456-7892"},
    {"name": "Diana", "email": "diana@example.com", "phone": "123-456-7893"},
    {"name": "Eva", "email": "eva@example.com", "phone": "123-456-7894"},
    {"name": "Fiona", "email": "fiona@example.com", "phone": "123-456-7895"},
    {"name": "Gunda", "email": "gunda@example.com", "phone": "123-456-7896"},
    {"name": "Hege", "email": "hege@example.com", "phone": "123-456-7897"},
    {"name": "Inga", "email": "inga@example.com", "phone": "123-456-7898"},
    {"name": "Johanna", "email": "johanna@example.com", "phone": "123-456-7899"},
    {"name": "Kitty", "email": "kitty@example.com", "phone": "123-456-7800"},
    {"name": "Linda", "email": "linda@example.com", "phone": "123-456-7801"},
    {"name": "Nina", "email": "nina@example.com", "phone": "123-456-7802"},
    {"name": "Ophelia", "email": "ophelia@example.com", "phone": "123-456-7803"},
    {"name": "Petunia", "email": "petunia@example.com", "phone": "123-456-7804"},
    {"name": "Amanda", "email": "amanda@example.com", "phone": "123-456-7805"},
    {"name": "Raquel", "email": "raquel@example.com", "phone": "123-456-7806"},
    {"name": "Cindy", "email": "cindy@example.com", "phone": "123-456-7807"},
    {"name": "Doris", "email": "doris@example.com", "phone": "123-456-7808"},
    {"name": "Eve", "email": "eve@example.com", "phone": "123-456-7809"},
    {"name": "Evita", "email": "evita@example.com", "phone": "123-456-7810"},
    {"name": "Sunniva", "email": "sunniva@example.com", "phone": "123-456-7811"},
    {"name": "Tove", "email": "tove@example.com", "phone": "123-456-7812"},
    {"name": "Unni", "email": "unni@example.com", "phone": "123-456-7813"},
    {"name": "Violet", "email": "violet@example.com", "phone": "123-456-7814"},
    {"name": "Liza", "email": "liza@example.com", "phone": "123-456-7815"},
    {"name": "Elizabeth", "email": "elizabeth@example.com", "phone": "123-456-7816"},
    {"name": "Ellen", "email": "ellen@example.com", "phone": "123-456-7817"},
    {"name": "Wenche", "email": "wenche@example.com", "phone": "123-456-7818"},
    {"name": "Vicky", "email": "vicky@example.com", "phone": "123-456-7819"}
]';


$users = json_decode($json, true);


$q = $_REQUEST["q"];

$hint = "";


if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($users as $user) {
        if (stristr($q, substr($user['name'], 0, $len))) {
            $suggestion = $user['name'] . " (Email: " . $user['email'] . ", Phone: " . $user['phone'] . ")";
            if ($hint === "") {
                $hint = $suggestion;
            } else {
                $hint .= "<br>$suggestion";
            }
        }
    }
}


echo $hint === "" ? "no suggestion" : $hint;
?>