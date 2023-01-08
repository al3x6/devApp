# Calcul de probabilité de la loi normale avec la méthode des rectangles droits

#! /usr/bin/python
from scipy.stats import norm
import matplotlib.pyplot as plt
import sys
from loi_normale import loi_normale
import numpy as np


def methode_rectangles(mu, sigma, quantile):
    a = 0  # limite inferieur alpha de l'intervalle [a;b]
    b = quantile  # limite superieur bêta de l'intervalle [a;b]
    n = 1000000  # Nbr de rectangles
    x = a
    largeur = (b - a) / n  # Largeur des rectangles
    resultat = 0

    for i in range(n):
        loi = loi_normale(mu,sigma,x)
        resultat = resultat + loi  # On somme la fonction de la loi normale
        x = x + largeur  # On avance pas à pas

    # Afficher le graphique
    return resultat * largeur + 0.5


def graphe(mu,sigma,quantile):
    plt.clf()
    axe = np.linspace(-4, 4, 100)
    plt.plot(axe, norm.pdf(axe, mu, sigma))
    # plt.show()
    plt.savefig('graphe.png')
    return methode_rectangles(mu,sigma,quantile)



mu = float(sys.argv[1])
sigma = float(sys.argv[2])
quantile = float(sys.argv[3])
print(methode_rectangles(mu,sigma,quantile))
#resultat = graphe(mu, sigma, quantile)
#print(resultat,"test")
