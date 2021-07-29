import pyttsx3
from gtts import gTTS  
from playsound import playsound  
file1 = open("abc.txt","r")
mytxt =str(file1.readlines())
language = 'en-in'  
obj = gTTS(text=mytxt)  
obj.save("test.mp3") 
# obj.save("test.ogg") 
