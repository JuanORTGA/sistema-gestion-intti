function SeleccionarParroquia(form){
 
    var Estado = form.estado.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipio.options;//se captura el elemento select que contiene los estados
    var Parroquia = form.parroquia.options;//se captura el elemento select que contiene los estados
    Parroquia.length = null;
 
 
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 
    if(Estado[1].selected == true){//Amazonas
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Alto Orinoco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Alto Orinoco");
            Parroquia[2] = new Option("Huachamacare Acanaña");
            Parroquia[3] = new Option("Marawaka Toky Shamanaña");
            Parroquia[4] = new Option("Mavaka Mavaka");
            Parroquia[5] = new Option("Sierra Parima Parimabé");
        }
        if(Municipio[2].selected == true){//Atabapo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Atabapo");
            Parroquia[2] = new Option("Ucata Laja Lisa");
            Parroquia[3] = new Option("Yapacana Macuruco");
            Parroquia[4] = new Option("Caname Guarinuma");
        }
        if(Municipio[3].selected == true){//Atures
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Fernando Girón Tovar");
            Parroquia[2] = new Option("Luis Alberto Gómez");
            Parroquia[3] = new Option("Pahueña Limón de Parhueña");
            Parroquia[4] = new Option("Platanillal");
        }
        if(Municipio[4].selected == true){//Autana
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Samariapo");
            Parroquia[2] = new Option("Sipapo Pendar");
            Parroquia[3] = new Option("Munduapo");
            Parroquia[4] = new Option("Guayapo San Pedro del Orinoco");
            Parroquia[5] = new Option("Isla Ratón");
        }
        if(Municipio[5].selected == true){//Manapiare
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Alto Ventuari");
            Parroquia[2] = new Option("Medio Ventuari");
            Parroquia[3] = new Option("Bajo Vnetuari");
            Parroquia[4] = new Option("Manapiare");
        }
        if(Municipio[6].selected == true){//Maroa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Maroa");
            Parroquia[2] = new Option("Victorino");
            Parroquia[3] = new Option("Comunidad");
        }
        if(Municipio[7].selected == true){//Río Negro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Casiquiare Curimacare");
            Parroquia[2] = new Option("Cocuy");
            Parroquia[3] = new Option("San Carlos de Río Negro");
            Parroquia[4] = new Option("Solano");
        }
    }
 
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 
    if(Estado[2].selected == true){//Anzoátegui
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Anaco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Anaco");
            Parroquia[2] = new Option("San Joaquín");
        }
        if(Municipio[2].selected == true){//Aragua
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cachipo");
            Parroquia[2] = new Option("Aragua de Barcelona");
        }
        if(Municipio[3].selected == true){//Bolivar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bergantín");
            Parroquia[2] = new Option("Caigua");
            Parroquia[3] = new Option("El Carmen");
            Parroquia[4] = new Option("El Pilar");
            Parroquia[5] = new Option("Naricual");
            Parroquia[6] = new Option("San Cristóbal");
        }
        if(Municipio[4].selected == true){//Bruzual
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Clarines");
            Parroquia[2] = new Option("Guanape");
            Parroquia[3] = new Option("Sabana de Uchire");
        }
        if(Municipio[5].selected == true){//Carvajal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Valle de Guanape");
            Parroquia[2] = new Option("Santa Bárbara");
        }
        if(Municipio[6].selected == true){//Cajigal
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Onoto");
            Parroquia[2] = new Option("San Pablo");
        }
        if(Municipio[7].selected == true){//Diego Bautista Urbaneja
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Lechería");
            Parroquia[2] = new Option("El Morro");
        }
        if(Municipio[8].selected == true){//Freites
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cantaura");
            Parroquia[2] = new Option("Libertador");
            Parroquia[3] = new Option("Santa Rosa");
            Parroquia[4] = new Option("Urica");
        }
        if(Municipio[9].selected == true){//Guanta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guanta");
            Parroquia[2] = new Option("Chorrerón");
        }
        if(Municipio[10].selected == true){//Guanipa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San José de Guanipa");
        }
        if(Municipio[11].selected == true){//Independencia
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mamo");
            Parroquia[2] = new Option("Soledad");
        }
        if(Municipio[12].selected == true){//Libertad
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Mateo");
            Parroquia[2] = new Option("El Carito");
            Parroquia[3] = new Option("Santa Inés");
            Parroquia[4] = new Option("La Romereña");
        }
        if(Municipio[13].selected == true){//Miranda
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Atapirire");
            Parroquia[2] = new Option("Boca del Pao");
            Parroquia[3] = new Option("El Pao");
            Parroquia[4] = new Option("Pariaguán");
        }
        if(Municipio[14].selected == true){//Monagas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mapire");
            Parroquia[2] = new Option("Piar");
            Parroquia[3] = new Option("Santa Clara");
            Parroquia[4] = new Option("San Diego de Cabrutica");
            Parroquia[5] = new Option("Uverito");
            Parroquia[6] = new Option("Zuata");
        }
        if(Municipio[15].selected == true){//Peñalver
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Puerto Píritu");
            Parroquia[2] = new Option("San Miguel");
            Parroquia[3] = new Option("Sucre");
        }
        if(Municipio[16].selected == true){//Piritu
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Píritu");
            Parroquia[2] = new Option("San Francisco");
        }
        if(Municipio[17].selected == true){//San Juan de Capistrano
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Boca de Uchire");
            Parroquia[2] = new Option("Boca de Chávez");
        }
        if(Municipio[18].selected == true){//Santa Ana
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Pueblo Nuevo");
            Parroquia[2] = new Option("Santa Ana");
        }
        if(Municipio[19].selected == true){//Simón Rodríguez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Edmundo Barrios");
            Parroquia[2] = new Option("Miguel Otero Silva");
        }
        if(Municipio[20].selected == true){//Sir Arthur McGregor
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Chaparro");
            Parroquia[2] = new Option("Tomás Alfaro");
            Parroquia[3] = new Option("Calatrava");
        }
        if(Municipio[21].selected == true){//Sotillo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Puerto La Cruz");
            Parroquia[2] = new Option("Pozuelos");
        }
    }
 
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 
    if(Estado[3].selected == true){//Apure
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Achaguas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Achaguas");
            Parroquia[2] = new Option("Apurito");
            Parroquia[3] = new Option("EL Yagual");
            Parroquia[4] = new Option("Guachara");
            Parroquia[5] = new Option("Mucuritas");
            Parroquia[6] = new Option("Queseras del Medio");
        }
        if(Municipio[2].selected == true){//Biruaca
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Biruaca");
        }
        if(Municipio[3].selected == true){//Muñoz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bruzual");
            Parroquia[2] = new Option("Mantecal");
            Parroquia[3] = new Option("Quintero");
            Parroquia[4] = new Option("Rincón Hondo");
            Parroquia[5] = new Option("San Vicente");
        }
        if(Municipio[4].selected == true){//Paéz
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guasdalito");
            Parroquia[2] = new Option("Aramendi");
            Parroquia[3] = new Option("El Amparo");
            Parroquia[4] = new Option("San Camilo");
            Parroquia[5] = new Option("Urdaneta");
        }
        if(Municipio[5].selected == true){//Pedro Camejo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Juan de Payara");
            Parroquia[2] = new Option("Codazzi");
            Parroquia[3] = new Option("Cunaviche");
        }
        if(Municipio[6].selected == true){//Rómulo Gallegos
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Elorza");
            Parroquia[2] = new Option("La Trinidad");
        }
        if(Municipio[7].selected == true){//San Fernando
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Fernando");
            Parroquia[2] = new Option("El Recreo");
            Parroquia[3] = new Option("Peñalver");
            Parroquia[4] = new Option("San Rafael de Atamica");
        }
    }
 
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 
    if(Estado[4].selected == true){//Aragua
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Bolivar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bolivar");
        }
        if(Municipio[2].selected == true){//Camatagua
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Camatagua");
            Parroquia[2] = new Option("Carmen de Cura");
        }
        if(Municipio[3].selected == true){//Francisco Linares Alcántara
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Rita");
            Parroquia[2] = new Option("Francisco de Miranda");
            Parroquia[3] = new Option("Monseñor Feliciano González");
        }
        if(Municipio[4].selected == true){//Girardot
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("José Ovalles");
            Parroquia[2] = new Option("Joaquín Crespo");
            Parroquia[3] = new Option("José Casanova Godoy");
            Parroquia[4] = new Option("Madre María de San José");
            Parroquia[5] = new Option("Andrés Eloy Blanco");
            Parroquia[6] = new Option("Los Tacarigua");
            Parroquia[7] = new Option("Las Delicias");
            Parroquia[8] = new Option("Choroní");
        }
        if(Municipio[5].selected == true){//José Ángel Lamas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Cruz");
        }
        if(Municipio[6].selected == true){//José Felix Rivas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Jua Vicente Bolívar");
            Parroquia[2] = new Option("Castor Nieves Rios");
            Parroquia[3] = new Option("Las Guacamayas");
            Parroquia[4] = new Option("Pao de Zárate");
            Parroquia[5] = new Option("Zuata");
        }
        if(Municipio[7].selected == true){//José  Rafael Revenga
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("José  Rafael Revenga");
        }
        if(Municipio[8].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Palo Negro");
            Parroquia[2] = new Option("San Martín de Porres");
        }
        if(Municipio[9].selected == true){//Mario Briceño Iragorry
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Limón");
            Parroquia[2] = new Option("Caña de Azucar");
        }
        if(Municipio[10].selected == true){//Ocumare de la Costa 
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ocumare de la Costa");
        }
        if(Municipio[11].selected == true){//San Casimiro
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Casimiro");
            Parroquia[2] = new Option("Güiripa");
            Parroquia[3] = new Option("Ollas de Caramacate");
            Parroquia[4] = new Option("Valle Morín");
        }
        if(Municipio[12].selected == true){//San Sebastián
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("San Sebastián");
        }
        if(Municipio[13].selected == true){//Santiago Mariño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Turmero");
            Parroquia[2] = new Option("Arevalo Aponte");
            Parroquia[3] = new Option("Chuao");
            Parroquia[4] = new Option("Samán de Güere");
            Parroquia[5] = new Option("Pacheco Miranda");
        }
        if(Municipio[14].selected == true){//Santos Michelena
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santos Michelena");
            Parroquia[2] = new Option("Tiara");
        }
        if(Municipio[15].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cagua");
            Parroquia[2] = new Option("Bella Vista");
        }
        if(Municipio[16].selected == true){//Tovar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tovar");
        }
        if(Municipio[17].selected == true){//Urdaneta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Urdaneta");
            Parroquia[2] = new Option("Las Peñitas");
            Parroquia[3] = new Option("San Francisco de Cara");
            Parroquia[4] = new Option("Taguay");
        }
        if(Municipio[18].selected == true){//Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Villa de Cura");
            Parroquia[2] = new Option("Magdaleno");
            Parroquia[3] = new Option("San Francisco de Asís");
            Parroquia[4] = new Option("Valles de Tucutunemo");
            Parroquia[5] = new Option("Augusto Mijares");
        }
    }
 
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 
    if(Estado[5].selected == true){//Barinas
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Alberto Arvelo Torrealba
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Sabaneta");
            Parroquia[2] = new Option("Juan Antonio Rodríguez Domínguez");
        }
        if(Municipio[2].selected == true){//Andrés Eloy Blanco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Cantón");
            Parroquia[2] = new Option("Santa Cruz de Guaca");
            Parroquia[3] = new Option("Puerto Vivas");
            Parroquia[4] = new Option("Primero de Diciembre");
        }
        if(Municipio[3].selected == true){//Antonio Jose de Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ticoporo");
            Parroquia[2] = new Option("Nicolás Pulido");
            Parroquia[3] = new Option("Andrés Bello");
        }
        if(Municipio[4].selected == true){//Arismendi
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Arismendi");
            Parroquia[2] = new Option("Guadarrama");
            Parroquia[3] = new Option("La Unión");
            Parroquia[4] = new Option("San Antonio");
        }
        if(Municipio[5].selected == true){//Barinas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Barinas");
            Parroquia[2] = new Option("Alberto Arvelo Larriva");
            Parroquia[3] = new Option("San Silvestre");
            Parroquia[4] = new Option("Santa Inés");
            Parroquia[5] = new Option("Santa Lucía");
            Parroquia[6] = new Option("Torunos");
            Parroquia[7] = new Option("El Carmen");
            Parroquia[8] = new Option("Rómulo Betancourt");
            Parroquia[9] = new Option("Corazón de Jesús");
            Parroquia[10] = new Option("Ramón Ignacio Méndez");
            Parroquia[11] = new Option("Alto Barinas");
            Parroquia[12] = new Option("Manuel Palacio Fajardo");
            Parroquia[13] = new Option("Juan Antonio Rodríguez Domínguez");
            Parroquia[14] = new Option("Dominga Ortiz de Páez");
        }
        if(Municipio[6].selected == true){//Bolívar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Barinitas");
            Parroquia[2] = new Option("Altamira de Cáceres");
            Parroquia[3] = new Option("Calderas");
        }
        if(Municipio[7].selected == true){//Cruz Paredes
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Barrancas");
            Parroquia[2] = new Option("El Socorro");
            Parroquia[3] = new Option("Mazparrito");
        }
        if(Municipio[8].selected == true){//Ezequiel Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Santa Bárbara");
            Parroquia[2] = new Option("Pedro Briceño Méndez");
            Parroquia[3] = new Option("Ramón Ignacio Méndez");
            Parroquia[4] = new Option("José Ignacio del Pumar");
        }
        if(Municipio[9].selected == true){//Obispos
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Obispos");
            Parroquia[2] = new Option("Los Guasimitos");
            Parroquia[3] = new Option("El Real");
            Parroquia[4] = new Option("La Luz");
        }
        if(Municipio[10].selected == true){//Pedraza
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ciudad Bolívia");
            Parroquia[2] = new Option("José Ignacio Briceño");
            Parroquia[3] = new Option("José Félix Rivas");
            Parroquia[4] = new Option("Páez");
        }
        if(Municipio[11].selected == true){//Rojas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Libertad");
            Parroquia[2] = new Option("Dolores");
            Parroquia[3] = new Option("Santa Rosa");
            Parroquia[4] = new Option("Palacio Fajardo");
            Parroquia[5] = new Option("Simón Rodríguez");
        }
        if(Municipio[12].selected == true){//Sosa
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ciudad de Nutrias");
            Parroquia[2] = new Option("El Regalo");
            Parroquia[3] = new Option("Puerto Nutrias");
            Parroquia[4] = new Option("Santa Catalina");
            Parroquia[5] = new Option("Simón Bolívar");
        }
    }
 
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 
    if(Estado[6].selected == true){//Bolivar
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Angostura
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Raúl Leoni");
            Parroquia[2] = new Option("Barceloneta");
            Parroquia[3] = new Option("Santa Bárbara");
            Parroquia[4] = new Option("San Francisco");
        }
        if(Municipio[2].selected == true){//Caroní
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cachamay");
            Parroquia[2] = new Option("Chirica");
            Parroquia[3] = new Option("Dalla Costa");
            Parroquia[4] = new Option("Once de Abril");
            Parroquia[5] = new Option("Simón Bolívar");
            Parroquia[6] = new Option("Unare");
            Parroquia[7] = new Option("Universidad");
            Parroquia[8] = new Option("Vista al sol");
            Parroquia[9] = new Option("Pozo verde");
            Parroquia[10] = new Option("Yocoima");
            Parroquia[10] = new Option("5 de Julio");
        }
        if(Municipio[3].selected == true){//Cedeño
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cedeño");
            Parroquia[2] = new Option("Altagracia");
            Parroquia[3] = new Option("Ascención Farreras");
            Parroquia[4] = new Option("Guaniamo");
            Parroquia[5] = new Option("La Urbana");
            Parroquia[6] = new Option("Pijiguaos");
        }
        if(Municipio[4].selected == true){//El Callao
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Callao");
        }
        if(Municipio[5].selected == true){//Gran Sabana
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Gran Sabana");
            Parroquia[2] = new Option("Ikabarú");
        }
        if(Municipio[6].selected == true){//Heres
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Catedral");
            Parroquia[2] = new Option("Zea");
            Parroquia[3] = new Option("Orinoco");
            Parroquia[4] = new Option("José Antonio Páez");
            Parroquia[5] = new Option("Marhuanta");
            Parroquia[6] = new Option("Agua Salada");
            Parroquia[7] = new Option("Vista Hermosa");
            Parroquia[8] = new Option("La Sanita");
            Parroquia[9] = new Option("Panapana");
        }
        if(Municipio[7].selected == true){//Padre Pedro Chien
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Padre Pedro Chien");
        }
        if(Municipio[8].selected == true){//Piar
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Andrés Eloy Blanco");
            Parroquia[2] = new Option("Pedro Cova");
            Parroquia[3] = new Option("Upata");
        }
        if(Municipio[9].selected == true){//Roscio
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Roscio");
            Parroquia[2] = new Option("Salóm");
        }
        if(Municipio[10].selected == true){//Sifones
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tumeremo");
            Parroquia[2] = new Option("Dalla Costa");
            Parroquia[3] = new Option("San Isidro");
        }
        if(Municipio[11].selected == true){//Sucre
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Sucre");
            Parroquia[2] = new Option("Aripao");
            Parroquia[3] = new Option("Guarataro");
            Parroquia[4] = new Option("Las Majadas");
            Parroquia[5] = new Option("Moitaco");
        }
    }
 
// ----------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------
 
    if(Estado[7].selected == true){//Carabobo
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Bejuma
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Bejuma");
            Parroquia[2] = new Option("Canoabo");
            Parroquia[3] = new Option("Simón Bolívar");
        }
        if(Municipio[2].selected == true){//Carlos Arvelo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Güigüe");
            Parroquia[2] = new Option("Belén");
            Parroquia[3] = new Option("Tacarigua");
        }
        if(Municipio[3].selected == true){//Diego Ibarra
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Mariara");
            Parroquia[2] = new Option("Aguas Calientes");
        }
        if(Municipio[4].selected == true){//Guacara
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Guacara");
            Parroquia[2] = new Option("Ciudad Alianza");
            Parroquia[3] = new Option("Yagua");
        }
        if(Municipio[5].selected == true){//Juan José Mora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Morón");
            Parroquia[2] = new Option("Urama");
        }
        if(Municipio[6].selected == true){//Libertador
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Indepedencia");
            Parroquia[1] = new Option("Tocuyito");
        }
    }

//----------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------

    if(Estado[8].selected == true){//Cojedes
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Anzoátegui
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Anzoátegui");
            Parroquia[3] = new Option("Ezequiel Zamora");
            Parroquia[4] = new Option("Girardot");
            Parroquia[5] = new Option("Lima Blanco");
            Parroquia[6] = new Option("Pao de San Juan Bautista");
            Parroquia[7] = new Option("Ricaurte");
            Parroquia[8] = new Option("Rómulo Gallegos");
            Parroquia[9] = new Option("Tinaco");
            Parroquia[10] = new Option("Tinaquillo");
        }
        if(Municipio[2].selected == true){//Ezequiel Zamora
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Ezequiel Zamora");
        }
        if(Municipio[3].selected == true){//Girardot
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Baúl");
        }
        if(Municipio[4].selected == true){//Lima Blanco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("La Aguadita");
            Parroquia[2] = new Option("Macapo");
        }
        if(Municipio[5].selected == true){//Pao de San Juan Bautista
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("El Pao");
        }
        if(Municipio[6].selected == true){//Ricaurte
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Libertad");
        }
        if(Municipio[7].selected == true){//Rómulo Gallegos
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Las Vegas");
        }
        if(Municipio[8].selected == true){//Tinaco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tinaco");
        }
        if(Municipio[9].selected == true){//Tinaquillo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Tinaquillo");
        }
    }
}