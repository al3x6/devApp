import sys

def hex_to_binary(hexa):
    binnaire = bytes.fromhex(hexa)
    return binnaire

hexa = str(sys.argv[1])
print(hex_to_binary(hexa))

