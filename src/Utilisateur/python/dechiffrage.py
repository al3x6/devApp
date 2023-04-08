import sys

def permutation(key):
    """Initialise la liste de permutation en utilisant une chaine de charactère en ASCII

    Args:
        key (String): Mot pour faire la permutation

    Returns:
        List: Liste de permutation
    """
    s = list(range(256))
    j = 0
    for i in range(256):
        j = (j + s[i] + ord(key[i % len(key)])) % 256
        s[i], s[j] = s[j], s[i]
    return s

def rc4(s, length):
    """Génère une clé de déchiffrage de la longueur donnée en utilisant la liste de permuation

    Args:
        s (List): Liste de permutation
        length (String): mot dont on prendra ça longueur

    Returns:
        [Liste]: Clé de déchiffrage
    """
    i = 0
    j = 0
    keystream = []
    for _ in range(length):
        i = (i + 1) % 256
        j = (j + s[i]) % 256
        s[i], s[j] = s[j], s[i]
        keystream.append(s[(s[i] + s[j]) % 256])
    return keystream

def decryptage(ciphertext, key):
    """Déchiffre en ascii le message ciphertext grâce à la clé de déchiffrage key

    Args:
        ciphertext (String): Message chiffré
        key (List): Clé de chiffrement

    Returns:
        String: Mot chiffré en ascii
    """
    ciphertext = bytes.fromhex(ciphertext)
    state = permutation(key)
    keystream = rc4(state, len(ciphertext))
    plaintext = [chr(ciphertext[i] ^ keystream[i]) for i in range(len(ciphertext))]
    return "".join(plaintext)

def enregistrer_fichier(ciphertext, fichier):
    """Enregistre le texte chiffré donné (en hexadécimal) dans le fichier spécifié

    Args:
        ciphertext (String): Message chiffré
        fichier (File): Fichier dans lequel on enregistre
    """
    with open(fichier, "w") as f:
        f.write(ciphertext)

def lire_fichier(fichier):
    """Lire le texte chiffré (en hexadécimal) à partir du fichier spécifié et le renvoyer

    Args:
        fichier (File): Fichier à lire

    Returns:
        String: le message chiffré
    """
    with open(fichier, "r") as f:
        return f.read()


chiffrage = str(sys.argv[1])
cle = str(sys.argv[2])

print(decryptage(chiffrage,cle))

