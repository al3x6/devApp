# Fonction pour la loi normale

#! /usr/bin/python
import matplotlib.pyplot as plt
import math
import sys


def loi_normale(mu, sigma, x):
    return (1 / (sigma * math.sqrt(2 * math.pi))) * math.exp(-(x - mu) ** 2 / (2 * sigma ** 2))

if __name__ == '__main__':
    mu = float(sys.argv[1])
    sigma = float(sys.argv[2])
    x = int(sys.argv[3])
    resultat = loi_normale(mu, sigma, x)
    print(resultat)
