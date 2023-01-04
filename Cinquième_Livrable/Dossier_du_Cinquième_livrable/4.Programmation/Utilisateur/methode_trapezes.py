# Calcul de probabilité de la loi normale avec la méthode des trapèzes
from loi_normale import loi_normale
import sys

def methode_trapezes(mu,sigma,quantile):
    n = 1000000
    a = 0
    b = quantile
    largeur = (b - a) / n
    x = a
    resultat = 0

    ab = loi_normale(mu,sigma,x) + loi_normale(mu,sigma,quantile)
    for i in range(n):
        resultat = resultat + loi_normale(mu,sigma,x)
        x = x + largeur
    return (largeur / 2) * (ab + 2 * resultat) + 0.5

if __name__ == '__main__':
    mu = float(sys.argv[1])
    sigma = float(sys.argv[2])
    quantile = float(sys.argv[3])
    resultat = methode_trapezes(mu, sigma, quantile)
    print(resultat)