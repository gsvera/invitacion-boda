using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net;
using System.IO;
using Newtonsoft.Json;
using System.Security.Cryptography;

namespace Mifiel
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine(ConsultaApi());
            Console.ReadKey();
        }

        public static string ConsultaApi()
        {
            Objeto obj = new Objeto();
            obj.name = "Guillermo Salvador Vera Morales";
            obj.email = "gs.vera92@gmail.com";
            var data = Encoding.ASCII.GetBytes(JsonConvert.SerializeObject(obj));

            //var request = (HttpWebRequest)WebRequest.Create("http://127.0.0.1:8000/api/prueba-api");
            var request = (HttpWebRequest)WebRequest.Create("https://candidates.mifiel.com/api/v1/users");
            request.ContentType = "application/json; charset=utf-8";
            request.Method = "POST";
            request.ContentLength = data.Length;

            using (var stream = request.GetRequestStream())
            {
                stream.Write(data, 0, data.Length);
            }

            var response = (HttpWebResponse)request.GetResponse();

            var responseString = new StreamReader(response.GetResponseStream()).ReadToEnd();
            //Objeto nuevoObj = JsonConvert.DeserializeObject<Objeto>(responseString);
            var trans = JsonConvert.DeserializeObject<dynamic>(responseString);

            Respuesta newObjeto = JsonConvert.DeserializeObject<Respuesta>(responseString);

            string idUser = newObjeto.id;
            PutMifiel mifiel = new PutMifiel
            {
                result = nuevohash(newObjeto.next_challenge.challenge),
                id = idUser
            };

            string respuesta = ActualizarMifiel(mifiel);

            mifiel.result = TransformarHas(newObjeto.next_challenge.challenge, 1);


            return respuesta;
        }

        public static string ActualizarMifiel(PutMifiel mifiel)
        {
            var data = Encoding.ASCII.GetBytes(JsonConvert.SerializeObject(mifiel));
            string url = "https://candidates.mifiel.com/api/v1/users/" + mifiel.id + "/challenge/digest";
            var request = (HttpWebRequest)WebRequest.Create(url);
            request.ContentType = "application/json; charset=utf-8";
            request.Method = "PUT";
            request.ContentLength = data.Length;

            using (var stream = request.GetRequestStream())
            {
                stream.Write(data, 0, data.Length);
            }
            String prueba = nuevohash("6e7323bdb1ca725cc6c9571060304250");
            HttpWebResponse resp = (HttpWebResponse)request.GetResponse();

            var responseString = new StreamReader(resp.GetResponseStream()).ReadToEnd();

            RespuestaDos respuesta = JsonConvert.DeserializeObject<RespuestaDos>(responseString);
            PutMifiel nuevoMifiel = new PutMifiel()
            {
                result = nuevohashDos(respuesta.next_challenge.challenge, respuesta.next_challenge.difficulty),
                id = mifiel.id
            };

            ActualizarPOW(nuevoMifiel);

            return responseString;
        }

        public static string ActualizarPOW(PutMifiel mifiel)
        {
            var data = Encoding.ASCII.GetBytes(JsonConvert.SerializeObject(mifiel));
            var url = "https://candidates.mifiel.com/api/v1/users/"+mifiel.id+"/challenge/pow";
            var request = (HttpWebRequest)WebRequest.Create(url);
            request.ContentType = "application/json; charset=utf-8";
            request.Method = "PUT";
            request.ContentLength = data.Length;

            using (var stream = request.GetRequestStream())
            {
                stream.Write(data, 0, data.Length);
            }

            var resp = (HttpWebResponse)request.GetResponse();

            var responseString = new StreamReader(resp.GetResponseStream()).ReadToEnd();

            return responseString;
        }

        public static string nuevohash(string texto)
        {
            SHA256CryptoServiceProvider provider = new SHA256CryptoServiceProvider();

            byte[] inputBytes = Encoding.UTF8.GetBytes(texto);
            byte[] hashedBytes = provider.ComputeHash(inputBytes);

            StringBuilder output = new StringBuilder();

            for (int i = 0; i < hashedBytes.Length; i++)
                output.Append(hashedBytes[i].ToString("x2").ToLower());

            return output.ToString();
        }
        public static string nuevohashDos(string texto, string difficult)
        {
            SHA256CryptoServiceProvider provider = new SHA256CryptoServiceProvider();

            byte[] inputBytes = Encoding.UTF8.GetBytes(texto);
            byte[] hashedBytes = provider.ComputeHash(inputBytes);

            StringBuilder output = new StringBuilder();

            for (int i = 0; i < hashedBytes.Length; i++)
                output.Append(hashedBytes[i].ToString("x"+difficult).ToLower());

            return output.ToString();
        }
        public static string TransformarHas(string texto, int numero)
        {
            string result = String.Empty;

            using (SHA256 sha = SHA256.Create())
            {

                byte[] hasvalue = sha.ComputeHash(Encoding.UTF8.GetBytes(texto));

                foreach (byte b in hasvalue)
                {
                    result += $"{b:x}" + numero;
                }
            }

            return result;
        }

        public static string TransformarHas(string texto)
        {
            string result = String.Empty;

            using (SHA256 sha = SHA256.Create())
            {

                byte[] hasvalue = sha.ComputeHash(Encoding.UTF8.GetBytes(texto));

                foreach (byte b in hasvalue)
                {
                    result += $"{b:x}";
                }
            }

            return result;
        }

    }
    class Objeto {
        public string name;
        public string email;
    }

    class Respuesta
    {
        public bool success;
        public string id;
        public string message;
        public nextChallenge next_challenge;
    }
    class RespuestaDos
    {
        public bool succes;
        public nextChallenge2 next_challenge;
    }
    class nextChallenge
    {
        public string name;
        public string challenge;
        public bool solved;
    }
    class nextChallenge2
    {
        public string name;
        public string challenge;
        public string difficulty;
        public bool solved;
    }
    class PutMifiel
    {
        public string result;
        public string id;
    }
}
