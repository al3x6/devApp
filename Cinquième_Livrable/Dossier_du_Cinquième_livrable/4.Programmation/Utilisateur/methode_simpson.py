from scipy.stats import norm
import matplotlib.pyplot as plt
import sys
from loi_normale import loi_normale
import numpy as np

def simpson(mu,sigma,quantile):
    a=0
    b=quantile
    n = 1000000
    h = (b - a) / n
    s = loi_normale(mu,sigma,a) + loi_normale(mu,sigma,b)
    for i in range(1, n, 2):
        s += 4 * loi_normale(mu,sigma,a + i * h)
    for i in range(2, n-1, 2):
        s += 2 * loi_normale(mu,sigma,a + i * h)
    return s * h / 3

def graphe(mu,sigma,quantile):
    plt.clf()
    axe = np.linspace(-4, 4, 100)
    plt.plot(axe, norm.pdf(axe, mu, sigma))
    # plt.show()
    plt.savefig('graphe.png')
    return simpson(mu,sigma,quantile)

if __name__ == '__main__':
    mu = float(sys.argv[1])
    sigma = float(sys.argv[2])
    quantile = float(sys.argv[3])
    print(graphe(mu, sigma, quantile))