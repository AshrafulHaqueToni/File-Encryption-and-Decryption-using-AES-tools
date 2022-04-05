from Crypto.Cipher import AES
def pad(old):
  padded= old + (16- len(old)%16)*'#'
  return (padded)

plain_text = 'Ashraful Haque Tani'
plain_text = pad(plain_text)
plain_text = plain_text.encode('UTF-8')

# print(AES.block_size)
# print(plain_text)

key='ratjegeprojectkori'
key=pad(key)
key.encode('UTF-8')

cipher = AES.new(key,AES.MODE_ECB)
ciphertext = cipher.encrypt(plain_text)
#print(ciphertext)

cipher_d = AES.new(key,AES.MODE_ECB)
data = cipher.decrypt(ciphertext)

data = data.decode("UTF-8")

#print(data)

unpad = data.find('#')
data = data[:unpad]

print(data)
