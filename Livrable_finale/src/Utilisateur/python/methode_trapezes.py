# Calcul de probabilité de la loi normale avec la méthode des trapèzes

from scipy.stats import norm
import matplotlib.pyplot as plt
from python.loi_normale import loi_normale
import sys
import numpy as np

def methode_trapezes(mu,sigma,quantile):
    n = 1000000
    resultat=0
    a = 0
    x=a
    ab = loi_normale(mu,sigma,x) + loi_normale(mu,sigma,quantile)

    if(mu!=0 and sigma!=1):
        quantile = (quantile-mu) /sigma   #Changement de variable pour ramener à une loi normale centrée réduite

        b = quantile
        largeur = (b-a)/n

        muc = 0
        sigc = 1
        for k in range(n):
            resultat = resultat + loi_normale(muc,sigc, x)
            x=x+largeur
        return (largeur / 2) * (ab + 2 * resultat)+0.5

    else:
        b = quantile
        largeur = (b - a) / n
        for i in range(n):
            resultat = resultat + loi_normale(mu,sigma,x)
            x = x + largeur
        return (largeur / 2) * (ab + 2 * resultat) + 0.5


def graphe(mu,sigma,quantile):
    plt.clf()
    axe = np.linspace(-4, 4, 100)
    plt.plot(axe, norm.pdf(axe, mu, sigma))
    # plt.show()
    plt.savefig('graphe.png')
    return methode_trapezes(mu,sigma,quantile)


mu = float(sys.argv[1])
sigma = float(sys.argv[2])
quantile = float(sys.argv[3])
print(graphe(mu, sigma, quantile))

