import sys

def permutation(key):
    """Initialise s pour l'algorithme RC4 en utilisant la clé donnée en ASCII"""
    s = list(range(256))
    j = 0
    for i in range(256):
        j = (j + s[i] + ord(key[i % len(key)])) % 256
        s[i], s[j] = s[j], s[i]
    return s

def rc4(s, length):
    """Génère une clé de la longueur donnée en utilisant s"""
    i = 0
    j = 0
    keystream = []
    for _ in range(length):
        i = (i + 1) % 256
        j = (j + s[i]) % 256
        s[i], s[j] = s[j], s[i]
        keystream.append(s[(s[i] + s[j]) % 256])
    return keystream

def cryptage(plaintext, key):
    """Chiffre le texte en clair donné à l'aide de la clé donnée en ASCII et renvoyez le texte chiffré en hexadécimal
    """
    s = permutation(key)
    keystream = rc4(s, len(plaintext))
    ciphertext = [chr(ord(plaintext[i]) ^ keystream[i]) for i in range(len(plaintext))]
    return "".join("{:02x}".format(ord(c)) for c in ciphertext)

def enregistrer_fichier(ciphertext, fichier):
    """Enregistre le texte chiffré donné (en hexadécimal) dans le fichier spécifié"""
    with open(fichier, "w") as f:
        f.write(ciphertext)

def lire_fichier(fichier):
    """Lire le texte chiffré (en hexadécimal) à partir du fichier spécifié et le renvoyer"""
    with open(fichier, "r") as f:
        return f.read()


texte = str(sys.argv[1])
cle = str(sys.argv[2])
print(cryptage(texte,cle))