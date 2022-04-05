from Cryptodome.Cipher import AES
from Cryptodome.Util.Padding import pad,unpad
from base64 import b64decode
import getpass

key = getpass.getpass('Enter your key: ')
key = key.encode('UTF-8')
key = pad(key,AES.block_size)

with open('tmp.jpg.enc','r')as entry:
    try:
        data = entry.read()
        length = len(data)
        iv = data[:24]
        iv = b64decode(iv)
        ciphertext = data[24:length]
        ciphertext = b64decode(ciphertext)
        cipher = AES.new(key,AES.MODE_CFB,iv)
        decrypted = cipher.decrypt(ciphertext)
        decrypted = unpad(decrypted,AES.block_size)
        with open('after.jpg','wb')as data:
            data.write(decrypted)
        data.close()
    except(ValueError,KeyError):
        print('wrong key')