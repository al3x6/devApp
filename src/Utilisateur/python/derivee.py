from sympy import *
import matplotlib.pyplot as plt
import numpy as np
import sys

def derivative(function):
    x = Symbol('x')                 # On déclare x comme variable symbolique
    return diff(function, x)        # On utilise la fonction diff pour calculer la dérivée de la fonction par rapport à x

#function = "sqrt(x)"         # On définit la fonction sous forme de chaîne de caractères
#print(derivative(function))

def afficher_courbe(function):
    plt.clf()
    x = Symbol('x')
    y = parse_expr(function)
    f = lambdify(x, y)
    x_vals = np.linspace(-10, 10, 100)
    y_vals = f(x_vals)
    plt.plot(x_vals, y_vals)
    #plt.show()
    plt.savefig('src/Utilisateur/img/courbe.png')
    #function=str(function)
    return derivative(function)

if __name__ == '__main__':
    function = str(sys.argv[1])
    #print(afficher_courbe(function))
    print(derivative(function))