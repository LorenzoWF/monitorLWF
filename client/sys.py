#!/usr/bin/python3

import sys
import os
import configparser
import http.client, json as simplejson
import time

config = configparser.ConfigParser()
config.read('config.ini')

idCliente = config['CLIENTE']['id_cliente']
idServidor = config['CLIENTE']['id_servidor']

#FUNCOES AUXLIARES
def get_num(x):
    return int(''.join(ele for ele in x if ele.isdigit()))

def enviar(data):

    headers = { "charset" : "utf-8", "Content-Type": "application/json" }
    conn = http.client.HTTPConnection("monitor.lwf")

    sampleJson = simplejson.dumps(data, ensure_ascii = 'False')

    conn.request("POST", "/json", sampleJson, headers)

    response = conn.getresponse()

    resultado = response.read().decode("utf-8")

    logResponse = open("logs/responseServer.txt", "w")
    logResponse.write(resultado)

    conn.close()

#FAZER ESSA FUNCAO, ELA VAI MANDAR TODOS OS DADOS def atualizaDados():
#FAZER ESSA FUNCAO def processador():
#FAZER ESSA FUNCAO def memoria():

def cadastraDiscos(localDisco):

    os.system('df -h > logs/disco.txt')

    arquivo = open('logs/disco.txt')

    for linha in arquivo:
        valores = linha.split()

        if valores[0] == localDisco:
            local = valores[0]
            particao = valores[5]
            break;

    arquivo.close()

    dadosDisco = { "acao" : 1,
                   "idCliente" : idCliente,
                   "idServidor" : idServidor,
                   "local" : local,
                   "particao" : particao}

    enviar(dadosDisco)

def estDiscos(localDisco):

    os.system('df -h > logs/disco.txt')

    arquivo = open('logs/disco.txt')

    for linha in arquivo:
        valores = linha.split()

        if valores[0] == localDisco:
            local = valores[0]
            total = valores[1]
            usado = valores[2]
            disponivel = valores[3]
            porcentagem = valores[4]
            break;

    arquivo.close()

    dadosDisco = { "acao" : 2,
                   "idCliente" : idCliente,
                   "idServidor" : idServidor,
                   "local" : get_num(total),
                   "total" : get_num(total),
                   "usado" : get_num(usado),
                   "disponivel" : get_num(disponivel),
                   "porcentagem" : get_num(porcentagem),
                   "data" : time.strftime("%Y-%m-%d"),
                   "horario" : time.strftime("%H:%M:%S")}

    enviar(dadosDisco)

def main(argv):

    argumento = sys.argv[1]

    if sys.platform == 'win32':
      print("TESTE")
    elif sys.platform == 'darwin':
      print("TESTE")
    elif 'linux' in sys.platform:
        if argumento == 'estDiscos':
            localDisco = config['DISCOS']['local']
            estDiscos(localDisco)
        elif argumento == 'cadastraDiscos':
            localDisco = config['DISCOS']['local']
            cadastraDiscos(localDisco)


if __name__ == '__main__': main(sys.argv[1:])
