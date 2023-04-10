from sympy import *
import matplotlib.pyplot as plt
import numpy as np
import sys
import os

def derivative(function):
    """ Calcule la dérivée de la fonction

    Args:
        function (int): sqrt(x)

    Returns:
        int: résultat de la dérivé
    """
    x = Symbol('x')                 # On déclare x comme variable symbolique
    return diff(function, x)        # On utilise la fonction diff pour calculer la dérivée de la fonction par rapport à x

#function = "sqrt(x)"         # On définit la fonction sous forme de chaîne de caractères
#print(derivative(function))

def afficher_courbe(function):
    """Affiche la courbe de la fonction derivate

    Args:
        function (int): sqrt(x)

    Returns:
        int: résultat de la dérivé
    """
    plt.clf()
    x = Symbol('x')
    y = parse_expr(function)
    f = lambdify(x,y)
    x_vals = np.linspace(-10, 10, 100)
    y_vals = f(x_vals)
    plt.plot(x_vals,y_vals)
    #plt.show()

    plt.savefig('../img/courbe.png')
    #function=str(function)

#     img_dir = os.path.abspath('img')
#         if not os.path.exists(img_dir):
#             os.makedirs(img_dir)
#     plt.savefig(os.path.join(img_dir,'graphe.png'))
    #plt.savefig('C:\\Users\\alexi\\sae_dev_appli\\src\\Utilisateur\\img\\graphe.png'))
#     img_dir = os.path.abspath('C:/Users/alexi/sae_dev_appli/src/Utilisateur/img')
#     plt.savefig(os.path.join(img_dir, 'courbe.png'))
#     plt.savefig('C:/Users/alexi/sae_dev_appli/src/Utilisateur/img/courbe.png'))
    return derivative(function)

if __name__ == '__main__':
    function = str(sys.argv[1])
    #print(afficher_courbe(function))
    print(derivative(function))