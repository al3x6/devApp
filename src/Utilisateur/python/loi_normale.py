# Fonction pour la loi normale
import math
import sys

def loi_normale(mu, sigma, x):
    """ Revoie la fonction de la loi normale

    Args:
        mu (int): moyenne
        sigma (int): écart-type
        x (int): valeur maximum de la densité

    Returns:
        int: résultat de la fonction de la loi normale
    """
    return (1 / (sigma * math.sqrt(2 * math.pi))) * math.exp(-(x - mu) ** 2 / (2 * sigma ** 2))


if __name__ == '__main__':
    mu = float(sys.argv[1])
    sigma = float(sys.argv[2])
    x = int(sys.argv[3])
    resultat = loi_normale(mu, sigma, x)
    print(resultat)
