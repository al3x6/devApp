from scipy.stats import norm
import numpy as np
import math
import matplotlib . pyplot as plt
def f (x,m,o) :
    return (1/(o*math.sqrt(2*math.pi)))* math.exp(-(x-m)**2/(2*o**2))

#version rectangle
def methode_rect(f,t):
    n=1000000     #n: diviser en intervalle
    a=0           #a: borne minimum à 0 car pas de bornes minimum
    b=t           #b: borne maximum devient t car P(X<t)
    prem=(b-a)/n  #calcul d'avant la somme
    x=a           #x: c'est le x de la fonction de f(x), et il devient a car c'est la somme des f(a)
    somme=0       #somme: pour le calcul de l'air en dessous la courbe
    for i in range(n):  #Boucle pour la somme
        somme=somme+(f(x,m,o))
        x=x+prem
    return somme*prem+0.5

#version trapèze
def methode_trap(f,t):
    n=1000000
    a=0
    b=t
    prem=(b-a)/n
    x=a
    somme=0
    f_a_b=f(x,m,o)+f(b,m,o)
    for k in range(n):
        somme=somme+f(x,m,o)
        x=x+prem
    return((prem/2)*(f_a_b+2*somme)+0.5)



m=0
o=1
t=1.2
x=0
f(x,m,o)
print(methode_rect(f,t))
print(methode_trap(f,t))

plt.clf()
#s = np.random.normal(m, o, 1000)
#count, bins, ignored = plt.hist(s, 30, density=True)
axe = np.linspace(-4, 4, 100)
plt.plot(axe, norm.pdf(axe, m, o))
plt.show()