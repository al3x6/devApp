from scipy.stats import norm
import matplotlib.pyplot as plt
import sys
from loi_normale import loi_normale
import numpy as np

def simpson(mu,sigma,quantile):
    """Fonction densité avec la méthode de Simpson

    Args:
        mu (int): moyenne
        sigma (int): écart-type
        quantile (int): valeur maximum de la densité

    Returns:
        int: densité
    """

    n=1000000
    a=0
    x=a

    resultat=0
    result=0

    ab = loi_normale(mu,sigma,x) + loi_normale(mu,sigma,quantile)

    if(mu!=0 and sigma!=1):
        quantile=(quantile-mu)/sigma

        muc=0
        sigc=1

        b=quantile
        largeur=(b-a)/n
        
        for k in range(n):
            x= (k * (b-a)) / n
            resultat=resultat + loi_normale(muc,sigc,x)
        
        for j in range(n):
            x=((2 * j + 1) * (b-a)) / (2 * n)
            result=result + loi_normale(muc,sigc,x)

        return ((largeur/6) * (ab + 2 * resultat + 4 * result)+0.5)
    
    else:
        b=quantile
        largeur= (b-a) /n

        for k in range(n):
            x= (k * (b-a)) / n
            resultat= resultat + loi_normale(mu,sigma,x)
        
        for j in range(n):
            x=((2 * j + 1) * (b-a)) / (2 * n)
            result= result + loi_normale(mu,sigma,x)

        return ((largeur/6) * (ab + 2 * resultat + 4 * result)+0.5)
    

def graphe(mu,sigma,quantile):
    """Dessine le graphique de la fonction

    Args:
        mu (int): moyenne
        sigma (int): écart-type
        quantile (int): valeur maximum de la densité

    Returns:
        int: résultat de la fonction simpson
    """
    plt.clf()
    axe = np.linspace(-4, 4, 100)
    plt.plot(axe, norm.pdf(axe, mu, sigma))
    # plt.show()
    plt.savefig('../img/graphe.png')
    return simpson(mu,sigma,quantile)

if __name__ == '__main__':
    mu = float(sys.argv[1])
    sigma = float(sys.argv[2])
    quantile = float(sys.argv[3])
    print(graphe(mu, sigma, quantile))