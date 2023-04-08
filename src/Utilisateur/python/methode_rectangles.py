# Calcul de probabilité de la loi normale avec la méthode des rectangles droits
import sys

from scipy.stats import norm
import matplotlib.pyplot as plt
from loi_normale import loi_normale
import numpy as np


def methode_rectangles(mu, sigma, quantile):
    """Fonction densité avec la méthode des rectangles

    Args:
        mu (int): moyenne
        sigma (int): écart-type
        quantile (int): valeur maximum de la densité

    Returns:
        int: densité
    """

    n = 1000000  # Nbr de division (rectangles)
    resultat = 0  # C'est la somme
    a = 0  # a: borne minimum, limite inferieur alpha de l'intervalle [a;b]
    x = a  # x: x devient a car la fonction est f(x)=f(a)

    if (mu != 0 and sigma != 1):  # Si c'est pas la loi normale centrée réduite
        quantile = (quantile - mu) / sigma  # Changement de variable pour revenir à la loi normale centrée réduite
        muc = 0  # muc: Moyenne de la loi normale centrée réduite
        sigc = 1  # sigc: ecart de la loi normale centrée réduite
        b = quantile  # b: borne maximum devient t car P(X<t)
        largeur = (b - a) / n  # Calcul d'avant la somme
        for i in range(n):
            loi = loi_normale(muc, sigc, x)
            resultat = resultat + loi  # On somme la fonction de la loi normale
            x = x + largeur  # On avance pas à pas
        return resultat * largeur + 0.5

    else:
        b = quantile  # limite superieur bêta de l'intervalle [a;b]
        largeur = (b - a) / n  # Largeur des rectangles

        for i in range(n):
            loi = loi_normale(mu, sigma, x)
            resultat = resultat + loi  # On somme la fonction de la loi normale
            x = x + largeur  # On avance pas à pas
        return resultat * largeur + 0.5


def graphe(mu, sigma, quantile):
    """Dessine le graphique de la fonction

    Args:
        mu (int): moyenne
        sigma (int): écart-type
        quantile (int): valeur maximum de la densité

    Returns:
        int: résultat de la fonction methode_rectangle
    """
    plt.clf()
    interval = np.arange(mu - 4, quantile, 0.2)  # Intervalle pour les rectangles
    axe = np.linspace(mu - 6, mu + 4, 100)  # tracage de la courbe, et de l'axe
    plt.plot(axe, norm.pdf(axe, mu, sigma))

    for i in range(len(interval) - 1):  # Tracer rectangle pour chaque intervalle
        plt.fill_betweenx([0, norm.pdf(interval[i], mu, sigma)], interval[i], interval[i + 1], color='gray', alpha=0.5)
    plt.savefig('../img/graphe.png')
    return methode_rectangles(mu, sigma, quantile)


if __name__ == '__main__':
    mu = float(sys.argv[1])
    sigma = float(sys.argv[2])
    quantile = float(sys.argv[3])
    print(graphe(mu, sigma, quantile))
