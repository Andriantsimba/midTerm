import matplotlib.pyplot as plt 
import numpy as np 
x = np.linspace ( 0 , 20 , 100 ) # Make a list of the numbers are equidistant dala m range specified 
plt.plot (x, np.sin (x)) # Plot sinusoid of each value
plt.show () # show plots