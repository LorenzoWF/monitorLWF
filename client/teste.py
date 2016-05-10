#!/usr/bin/python3

import sys
import configparser

config = configparser.ConfigParser()
config.read('config.ini')

def main(argv):

  argumento = sys.argv[1]

  if sys.platform == 'win32':
    print("TESTE")
  elif sys.platform == 'darwin':
    print("TESTE")
  elif 'linux' in sys.platform:

      if argumento == 'discos':

          #n = 0
          for n in config['DISCOS']:
              localDisco = config['DISCOS'][n]
              print(localDisco)
              print(n[5:6])


if __name__ == '__main__': main(sys.argv[1:])
