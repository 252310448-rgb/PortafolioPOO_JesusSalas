# Clase base
class Usuario:
    def __init__(self, nombre, email):
        self.nombre = nombre
        # Validación básica de email
        if "@" in email and "." in email:
            self.email = email
            self.valido = True
        else:
            self.email = None
            self.valido = False
            print(f" ERROR: El email '{email}' no es válido. Registro bloqueado.")
        
    def mostrar_datos(self):
        if self.valido:
           print(f"Nombre: {self.nombre} | Email: {self.email}")
        else: 
            print("ERROR: No se pueden mostrar datos. Usuario no válido")


    def acceso_sistema(self):
        if self.valido:
           print(f"El usuario {self.nombre} está intentando acceder...")
        else: 
            print("ACCESO DENEGADO: Credenciales inválidas")

    def saludar(self):
        print(f"Hola, soy {self.nombre}. Mucho gusto")


# Clase Admin (Hereda de Usuario)
class Admin(Usuario):
    def __init__(self, nombre, email, nivel_acceso):
        # Usamos super() para heredar nombre y email
        super().__init__(nombre, email)
        self.nivel_acceso = nivel_acceso
    # Sobrescribimos el acceso
    def acceso_sistema(self):
        print(f"ACCESO TOTAL: Bienvenido Administrador {self.nombre} (Nivel de acceso: {self.nivel_acceso})")
 
# Clase Cliente (Hereda de Usuario)
class Cliente(Usuario):
    def __init__(self, nombre, email, puntos):
        super().__init__(nombre, email)
        self.puntos = puntos

    def acceso_sistema(self):
        print(f"ACCESO LIMITADO: Bienvenido Cliente {self.nombre}. Tienes {self.puntos} puntos.")

# Clase Invitado (Hereda de Usuario)
class Invitado(Usuario):
    def acceso_sistema(self):
        if self.valido:
           print(f"ACCESO TEMPORAL: El invitado {self.nombre} tiene permisos de solo lectura.")
        else: 
            print(f"El invitado {self.nombre} No tiene permisos")

# Aplicación principal (menú)
def menu():
    # Lista para guardar los objetos
    lista_usuarios = []

    # Creación de los objetos requeridos
    admin1 = Admin("Pedro Martínez", "pedro@it.com", "Administrador")
    cliente1 = Cliente("Martín Lopez", "martin@mail.com", 1500)
    invitado1 = Invitado("Miguel Reyes", "miguel@invitado.com")
    invitado2 = Invitado("Emmanuel Alemán", "emmanuel.com ")

    # Los agregamos a la lista
    lista_usuarios.append(admin1)
    lista_usuarios.append(cliente1)
    lista_usuarios.append(invitado1)
    lista_usuarios.append(invitado2)

    print("- SISTEMA DE CONTROL DE USUARIOS -")
    
    # Recorremos la lista aplicando Polimorfismo
    for u in lista_usuarios:
        u.saludar()
        u.mostrar_datos()
        u.acceso_sistema()
        print("-" * 40)

# Ejecutamos el programa
if __name__ == "__main__":
    menu()