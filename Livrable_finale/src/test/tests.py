from operator import mod

import struct


def permutation(key):
    """Initialise s de l'algorithme RC4 en utilisant la clé donnée en ASCII."""
    s = list(range(256))
    j = 0
    for i in range(256):
        j = (j + s[i] + ord(key[i % len(key)])) % 256
        s[i], s[j] = s[j], s[i]
    return s


def rc4(s, length):
    """Génère une clé de la longueur donnée en utilisant s."""
    i = 0
    j = 0
    key = []
    for _ in range(length):
        i = (i + 1) % 256
        j = (j + s[i]) % 256
        s[i], s[j] = s[j], s[i]
        key.append(s[(s[i] + s[j]) % 256])
    return key


def encrypt_text(plaintext, key):
    """Chiffrez le texte en clair donné à l'aide de la clé donnée en ASCII et renvoyez le
     texte chiffré en hexadécimal.
    """
    state = permutation(key)
    keystream = rc4(state, len(plaintext))
    ciphertext = [chr(ord(plaintext[i]) ^ keystream[i]) for i in range(len(plaintext))]
    return "".join("{:02x}".format(ord(c)) for c in ciphertext)


def decrypt_text(ciphertext, key):
    """Déchiffrer le texte chiffré donné (en hexadécimal) en utilisant la clé donnée dans
     ASCII et renvoie le texte en clair.
    """
    ciphertext = bytes.fromhex(ciphertext)
    state = permutation(key)
    keystream = rc4(state, len(ciphertext))
    plaintext = [chr(ciphertext[i] ^ keystream[i]) for i in range(len(ciphertext))]
    return "".join(plaintext)


def save_to_file(ciphertext, filename):
    """Enregistrer le texte chiffré donné (en hexadécimal) dans le fichier spécifié."""
    with open(filename, "w") as f:
        f.write(ciphertext)


def read_from_file:
    [15: 06]
    """Lire le texte chiffré (en hexadécimal) à partir du fichier spécifié et le renvoyer."""    with open(filename, "r") as f:
    return f.read()
