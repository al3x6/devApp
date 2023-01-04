# Calcul de probabilité de la loi normale avec la méthode des rectangles droits
import matplotlib.pyplot as plt
import sys
from loi_normale import loi_normale

def methode_rectangles(mu, sigma, quantile):
    a = 0  # limite inferieur alpha de l'intervalle [a;b]
    b = quantile  # limite superieur bêta de l'intervalle [a;b]
    n = 1000000  # Nbr de rectangles
    x = a
    largeur = (b - a) / n  # Largeur des rectangles
    resultat = 0
    vx=[]
    vy=[]

    for i in range(n):
        loi = loi_normale(mu,sigma,x)
        resultat = resultat + loi  # On somme la fonction de la loi normale
        x = x + largeur  # On avance pas à pas
        vx.append(i)
        vy.append(loi)

    plt.bar(vx, vy, width=2)
    # Afficher le graphique
    plt.show()
    return resultat * largeur + 0.5


# def graphe(mu,sigma,quantile):
#     x = [i for i in range(-5, 6)]
#     y = [methode_rectangles(mu,sigma,i) for i in x]
#
#     plt.plot(x, y)
#     # plt.show()
#     plt.savefig('graphe.png')
#     return loi_normale(mu,sigma,5)

#
# if __name__ == '__main__':
#     mu = float(sys.argv[1])
#     sigma = float(sys.argv[2])
#     quantile = float(sys.argv[3])

resultat = methode_rectangles(0, 1, 0)
print(resultat)