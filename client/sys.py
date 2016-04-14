#!/usr/bin/python3

import sys
import os
import configparser
import http.client, json as simplejson
import time

config = configparser.ConfigParser()
config.read('config.ini')

idCliente = config['CLIENTE']['id']

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

def disco(localDisco):

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
            particao = valores[5]
            break;

    arquivo.close()

    dadosDisco = { "idCliente" : idCliente,
                   "local" : local,
                   "total" : get_num(total),
                   "usado" : get_num(usado),
                   "disponivel" : get_num(disponivel),
                   "porcentagem" : get_num(porcentagem),
                   "particao" : particao,
                   "data" : time.strftime("%Y-%m-%d"),
                   "horario" : time.strftime("%H:%M:%S")}

    enviar(dadosDisco)

def main():

    if sys.platform == 'win32':
      print("TESTE")
    elif sys.platform == 'darwin':
      print("TESTE")
    elif 'linux' in sys.platform:
        localDisco = config['DISCOS']['local']
        disco(localDisco)


if __name__ == '__main__': main()
