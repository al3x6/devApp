# Fonction pour la loi normale
import matplotlib.pyplot as plt
import math
import sys


def loi_normale(mu, sigma, x):
    return (1 / (sigma * math.sqrt(2 * math.pi))) * math.exp(-(x - mu) ** 2 / (2 * sigma ** 2))

def graphe(mu,sigma):
    x = [i for i in range(-5, 6)]
    y = [loi_normale(mu,sigma,i) for i in x]

    plt.plot(x, y)
    # plt.show()
    plt.savefig('graphe.png')
    return loi_normale(mu,sigma,5)


if __name__ == '__main__':
    mu = float(sys.argv[1])
    sigma = float(sys.argv[2])
    x = int(sys.argv[3])
    resultat = loi_normale(mu, sigma, x)
    # resultat = graphe(mu,sigma)
    print(resultat)