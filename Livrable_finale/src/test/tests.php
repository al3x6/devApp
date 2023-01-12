<?php
function permutation($key) {
    /*Initialise s pour l'algorithme RC4 en utilisant la clé donnée en ASCII*/
    $s = range(0,255);
    $j = 0;
    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
        $save = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $save;
    }
    return $s;
}

function rc4($s, $length) {
    /*Génère une clé de la longueur donnée en utilisant s*/
    $i = 0;
    $j = 0;
    $key = array();
    for ($x = 0; $x < $length; $x++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        $save = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $save;
        $key.append($s[($s[$i] + $s[$j]) % 256]);
    }
    return $key;
}

function encrypt_text($plaintext, $key) {
    /*Chiffre le texte en clair donné à l'aide de la clé donnée en ASCII et renvoyez le texte chiffré en hexadécimal*/
    $s = permutation($key);
    $k = rc4($s, strlen($plaintext));
    $chiffrage = "";
    for ($i = 0; $i < strlen($plaintext); $i++) {
        $chiffrage .= chr(ord($plaintext[$i]) ^ $k[$i]); /*Ajoute la valeur de chr à la suite de celle de $chiffrage*/
    }
}

function decrypt_text($chiffrage, $key){
    /*Déchiffrer le texte chiffré donné (en hexadécimal) en utilisant la clé donnée dans ASCII et renvoie le texte en clair*/
    $chiffrage = bytes.fromhex($chiffrage);
    $s = permutation($key);
    $keystream = rc4($s, len($chiffrage));
    $plaintext = "";
    for ($i=0; $i<strlen($chiffrage);$i++){
        $plaintext .=chr($chiffrage[$i] ^ $keystream[$i]);
    }
    return "".join($plaintext);
}


function save_to_file($chiffrage, $file){
    /*Enregistrer le texte chiffré donné (en hexadécimal) dans le fichier spécifié*/
    $fp=fopen($file,"w");
    $fp.write($chiffrage);
}

function read_from_file($file){
    /*Lire le texte chiffré (en hexadécimal) à partir du fichier spécifié et le renvoyer*/
    $fp=fopen($file,"r");
    $fp.read();
}



