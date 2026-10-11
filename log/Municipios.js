function SeleccionarMunicipio(form){
 
    var Estado = form.estado.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipio.options;//se captura el elemento select que contiene los estados
    Municipio.length = null;
 
    if(Estado[0].selected == true){//si la opcion cero del array select esta seleccionada, la opcion cero del array municipio valdra 
        var destino0 = new Option("espere","");
        Municipio[0] = destino0;
    }
    if(Estado[1].selected == true){//1_Amazonas
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Alto Orinoco");
        Municipio[2] = new Option("Atabapo");
        Municipio[3] = new Option("Atures");
        Municipio[4] = new Option("Autana");
        Municipio[5] = new Option("Manapiare");
        Municipio[6] = new Option("Maroa");
        Municipio[7] = new Option("Rio Negro");
    }
    if(Estado[2].selected == true){//2_Anzoátegui
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Anaco");
        Municipio[2] = new Option("Aragua");
        Municipio[3] = new Option("Bolívar");
        Municipio[4] = new Option("Bruzual");
        Municipio[5] = new Option("Carvajal");
        Municipio[6] = new Option("Cajigal");
        Municipio[7] = new Option("Diego Bautista Urbaneja");
        Municipio[8] = new Option("Freites");
        Municipio[9] = new Option("Guanta");
        Municipio[10] = new Option("Guanipa");
        Municipio[11] = new Option("Independencia");
        Municipio[12] = new Option("Libertad");
        Municipio[13] = new Option("Miranda");
        Municipio[14] = new Option("Monagas");
        Municipio[15] = new Option("Peñalver");
        Municipio[16] = new Option("Piritu");
        Municipio[17] = new Option("San Juan de Capistrano");
        Municipio[18] = new Option("Santa Ana");
        Municipio[19] = new Option("Simón Rodríguez");
        Municipio[20] = new Option("Sir Arthur McGregor");
        Municipio[21] = new Option("Sotillo");
    }
    if(Estado[3].selected == true){//3_Apure
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Achaguas");
        Municipio[2] = new Option("Biruaca");
        Municipio[3] = new Option("Muñoz");
        Municipio[4] = new Option("Paéz");
        Municipio[5] = new Option("Pedro Camejo");
        Municipio[6] = new Option("Rómulo Gallegos");
        Municipio[7] = new Option("San Fernando");
    }
    if(Estado[4].selected == true){//4_Aragua
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Bolívar");
        Municipio[2] = new Option("Camatagua");
        Municipio[3] = new Option("Francisco Linares Alcántara");
        Municipio[4] = new Option("Girardot");
        Municipio[5] = new Option("José Ángel Lamas");
        Municipio[6] = new Option("José Félix Rívas");
        Municipio[7] = new Option("José Rafael Revenga");
        Municipio[8] = new Option("Libertador");
        Municipio[9] = new Option("Mario Briceño Iragorry");
        Municipio[10] = new Option("Ocumare");
        Municipio[11] = new Option("San Casimiro");
        Municipio[12] = new Option("San Sebastián");
        Municipio[13] = new Option("Santiago Mariño");
        Municipio[14] = new Option("Santos Michelena");
        Municipio[15] = new Option("Sucre");
        Municipio[16] = new Option("Tovar");
        Municipio[17] = new Option("Urdaneta");
        Municipio[18] = new Option("Zamora");
    }
    if(Estado[5].selected == true){//5_Barinas
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Alberto Arvelo Torrealba");
        Municipio[2] = new Option("Andrés Eloy Blanco");
        Municipio[3] = new Option("Antonio Jose de Sucre");
        Municipio[4] = new Option("Arismendi");
        Municipio[5] = new Option("Barinas");
        Municipio[6] = new Option("Bolívar");
        Municipio[7] = new Option("Cruz Paredes");
        Municipio[8] = new Option("Ezequiel Zamora");
        Municipio[9] = new Option("Obispos");
        Municipio[10] = new Option("Pedraza");
        Municipio[11] = new Option("Rojas");
        Municipio[12] = new Option("Sosa");
    }
    if(Estado[6].selected == true){//6_Bolivar
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Angostura");
        Municipio[2] = new Option("Caroní");
        Municipio[3] = new Option("Cedeño");
        Municipio[4] = new Option("El Callao");
        Municipio[5] = new Option("Gran Sabana");
        Municipio[6] = new Option("Heres");
        Municipio[7] = new Option("Padre Pedro Chien");
        Municipio[8] = new Option("Piar");
        Municipio[9] = new Option("Roscio");
        Municipio[10] = new Option("Sifones");
        Municipio[11] = new Option("Sucre");
    }
    if(Estado[7].selected == true){//7_Carabobo
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Bejuma");
        Municipio[2]  = new Option("Carlos Arvelo");
        Municipio[3] = new Option("Diego Ibarra");
        Municipio[4] = new Option("Guacara");
        Municipio[5] = new Option("Juan Jose Mora");
        Municipio[6] = new Option("Libertador");
        Municipio[7] = new Option("Los Guayos");
        Municipio[8] = new Option("Miranda");
        Municipio[9] = new Option("Montalban");
        Municipio[10] = new Option("Naguanagua");
        Municipio[11] = new Option("Puerto Cabello");
        Municipio[12] = new Option("San Diego");
        Municipio[13] = new Option("San Joaquín");
        Municipio[14] = new Option("Valencia");
    }
    if(Estado[8].selected == true){//8_Cojedes
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Anzoátegui");
        Municipio[2] = new Option("Ezequiel Zamora");
        Municipio[3] = new Option("Girardot");
        Municipio[4] = new Option("Lima Blanco");
        Municipio[5] = new Option("Pao de San Juan Bautista");
        Municipio[6] = new Option("Ricaurte");
        Municipio[7] = new Option("Rómulo Gallegos");
        Municipio[8] = new Option("Tinaco");
        Municipio[9] = new Option("Tinaquillo");
    }
    if(Estado[9].selected == true){//9_Delta Amacuro
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Antonio Diaz");
        Municipio[2] = new Option("Casacoima");
        Municipio[3] = new Option("Pedernales");
        Municipio[4] = new Option("Tucupita");
    }
    if(Estado[10].selected == true){//10_Distrito Capital
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Libertador");
    }
    if(Estado[11].selected == true){//11_Falcon
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Acosta");
        Municipio[2] = new Option("Bolívar");
        Municipio[3] = new Option("Buchivacoa");
        Municipio[4] = new Option("Cacique Manaure");
        Municipio[5] = new Option("Carirubana");
        Municipio[6] = new Option("Colina");
        Municipio[7] = new Option("Dabajuro");
        Municipio[8] = new Option("Democracia");
        Municipio[9] = new Option("Falcón");
        Municipio[10] = new Option("Federación");
        Municipio[11] = new Option("Jacura");
        Municipio[12] = new Option("Los Taques");
        Municipio[13] = new Option("Miranda");
        Municipio[14] = new Option("Mauroa");
        Municipio[15] = new Option("Monseñor Iturriza");
        Municipio[16] = new Option("Palma Sola");
        Municipio[17] = new Option("Petit");
        Municipio[18] = new Option("Píritu");
        Municipio[19] = new Option("San Francisco");
        Municipio[20] = new Option("Silva");
        Municipio[21] = new Option("Sucre");
        Municipio[22] = new Option("Tocópero");
        Municipio[23] = new Option("Unión");
        Municipio[24] = new Option("Urumaco");
        Municipio[25] = new Option("Zamora");
    }
    if(Estado[12].selected == true){//Guárico
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Camaguán");
        Municipio[2] = new Option("Chaguaramas");
        Municipio[3] = new Option("El Socorro");
        Municipio[4] = new Option("Infante");
        Municipio[5] = new Option("Juan Germán Roscio");
        Municipio[6] = new Option("Las Mercedes");
        Municipio[7] = new Option("Mellado");
        Municipio[8] = new Option("Miranda");
        Municipio[9] = new Option("Monagas");
        Municipio[10] = new Option("Ortiz");
        Municipio[11] = new Option("Ribas");
        Municipio[12] = new Option("San Geronimo de Guayabal");
        Municipio[13] = new Option("San José de Guaribe");
        Municipio[14] = new Option("Santa María de Ipire");
        Municipio[15] = new Option("Zaraza");
    }
    if(Estado[13].selected == true){//Lara
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Andrés Eloy Blanco");
        Municipio[2]  = new Option("Crespo");
        Municipio[3] = new Option("Iribarren");
        Municipio[4] = new Option("Jiménez");
        Municipio[5] = new Option("Morán");
        Municipio[6] = new Option("Palavecino");
        Municipio[7] = new Option("Simón Planas");
        Municipio[8] = new Option("Torres");
        Municipio[9] = new Option("Uradneta");
    }
    if(Estado[14].selected == true){//Mérida
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Alberto Adriani");
        Municipio[2] = new Option("Andrés Bello");
        Municipio[3] = new Option("Antonio Pinto Salinas");
        Municipio[4] = new Option("Aricagua");
        Municipio[5] = new Option("Arzobispo Chacón");
        Municipio[6] = new Option("Campo Elías");
        Municipio[7] = new Option("Caracciolo Parra Olmedo");
        Municipio[8] = new Option("Cardenal Quintero");
        Municipio[9] = new Option("Guaraque");
        Municipio[10] = new Option("Julio César Salas");
        Municipio[11] = new Option("Justo Briceño");
        Municipio[12] = new Option("Libertador");
        Municipio[13] = new Option("Miranda");
        Municipio[14] = new Option("Obispo Ramos de Lora");
        Municipio[15] = new Option("Padre Noguera");
        Municipio[16] = new Option("Pueblo Llano");
        Municipio[17] = new Option("Rangel");
        Municipio[18] = new Option("Rivas Dávila");
        Municipio[19] = new Option("Santos Marquina");
        Municipio[20] = new Option("Sucre");
        Municipio[21] = new Option("Tovar");
        Municipio[22] = new Option("Tulio Febres Cordero");
        Municipio[23] = new Option("Zea");
    }
    if(Estado[15].selected == true){//Miranda
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Acevedo");
        Municipio[2] = new Option("Andrés Bello");
        Municipio[3] = new Option("Baruta");
        Municipio[4] = new Option("Brión");
        Municipio[5] = new Option("Buroz");
        Municipio[6] = new Option("Carrizal");
        Municipio[7] = new Option("Chacao");
        Municipio[8] = new Option("Cristóbal Rojas");
        Municipio[9] = new Option("El Hatillo");
        Municipio[10] = new Option("Guaicaipuro");
        Municipio[11] = new Option("Independencia");
        Municipio[12] = new Option("Los Salias");
        Municipio[13] = new Option("Páez");
        Municipio[14] = new Option("Paz Castillo");
        Municipio[15] = new Option("Pedro Gual");
        Municipio[16] = new Option("Plaza");
        Municipio[17] = new Option("Simón Bolívar");
        Municipio[18] = new Option("Sucre");
        Municipio[19] = new Option("Tomás Lander");
        Municipio[20] = new Option("Urdaneta");
        Municipio[21] = new Option("Zamora");
    }
    if(Estado[16].selected == true){//Monagas
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Acosta");
        Municipio[2] = new Option("Aguasay");
        Municipio[3] = new Option("Bolivar");
        Municipio[4] = new Option("Caripe");
        Municipio[5] = new Option("Cedeño");
        Municipio[6] = new Option("Ezequiel Zamora");
        Municipio[7] = new Option("Libertador");
        Municipio[8] = new Option("Maturín");
        Municipio[9] = new Option("Piar");
        Municipio[10] = new Option("Punceres");
        Municipio[11] = new Option("Santa Bárbara");
        Municipio[12] = new Option("Sotillo");
        Municipio[13] = new Option("Uracoa");
    }
    if(Estado[17].selected == true){//Nueva Esparta
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Antolín del Campo");
        Municipio[2] = new Option("Arismendi");
        Municipio[3] = new Option("Díaz");
        Municipio[4] = new Option("García");
        Municipio[5] = new Option("Gómez");
        Municipio[6] = new Option("Maneiro");
        Municipio[7] = new Option("Marcano");
        Municipio[8] = new Option("Mariño");
        Municipio[9] = new Option("Península de Macanao");
        Municipio[10] = new Option("Tubores");
        Municipio[11] = new Option("Villalbal");
    }
    if(Estado[18].selected == true){//Portuguesa
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Agua Blanca");
        Municipio[2] = new Option("Araure");
        Municipio[3] = new Option("Esteller");
        Municipio[4] = new Option("Guanare");
        Municipio[5] = new Option("Guanarito");
        Municipio[6] = new Option("Monseñor Jose Vicente de Unda");
        Municipio[7] = new Option("Ospino");
        Municipio[8] = new Option("Páez");
        Municipio[9] = new Option("Papelón");
        Municipio[10] = new Option("San Genaro de Boconoito");
        Municipio[11] = new Option("San Rafael de Onoto");
        Municipio[12] = new Option("Santa Rosalía");
        Municipio[13] = new Option("Sucre");
        Municipio[14] = new Option("Turén");
    }
    if(Estado[19].selected == true){//Sucre
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Andrés Eloy Blanco");
        Municipio[2] = new Option("Andrés Mata");
        Municipio[3] = new Option("Arismendi");
        Municipio[4] = new Option("Benítez");
        Municipio[5] = new Option("Bermúdez");
        Municipio[6] = new Option("Bolívar");
        Municipio[7] = new Option("Cajigal");
        Municipio[8] = new Option("Cruz Salmerón Acosta");
        Municipio[9] = new Option("Libertador");
        Municipio[10] = new Option("Mariño");
        Municipio[11] = new Option("Mejía");
        Municipio[12] = new Option("Montes");
        Municipio[13] = new Option("Ribero");
        Municipio[14] = new Option("Sucre");
        Municipio[15] = new Option("Valdez");
    }
    if(Estado[20].selected == true){//Táchira
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Andrés Bello");
        Municipio[2] = new Option("Antonio Rómulo Costa");
        Municipio[3] = new Option("Ayacucho");
        Municipio[4] = new Option("Bolívar");
        Municipio[5] = new Option("Cárdenas");
        Municipio[6] = new Option("Córdoba");
        Municipio[7] = new Option("Fernández Feo");
        Municipio[8] = new Option("Francisco de Miranda");
        Municipio[9] = new Option("García de Hevia");
        Municipio[10] = new Option("Guásimos");
        Municipio[11] = new Option("Independencia");
        Municipio[12] = new Option("Jáuregui");
        Municipio[13] = new Option("José María Vargas");
        Municipio[14] = new Option("Junín");
        Municipio[15] = new Option("Libertad");
        Municipio[16] = new Option("Libertador");
        Municipio[17] = new Option("Labatera");
        Municipio[18] = new Option("Michelena");
        Municipio[19] = new Option("Panamericano");
        Municipio[20] = new Option("Pedro María de Uerña");
        Municipio[21] = new Option("Rafael Urdaneta");
        Municipio[22] = new Option("Samuel Darío Maldonado");
        Municipio[23] = new Option("San Cristobal");
        Municipio[24] = new Option("San Judas Tadeo");
        Municipio[25] = new Option("Seboruco");
        Municipio[26] = new Option("Simón Rodríguez");
        Municipio[27] = new Option("Sucre");
        Municipio[28] = new Option("Torbes");
        Municipio[29] = new Option("Uribante");
    }
    if(Estado[21].selected == true){//Trujillo
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Andrés Bello");
        Municipio[2] = new Option("Boconó");
        Municipio[3] = new Option("Bolívar");
        Municipio[4] = new Option("Candelaria");
        Municipio[5] = new Option("Carache");
        Municipio[6] = new Option("Escuque");
        Municipio[7] = new Option("J. Felipe Marquez Cañizales");
        Municipio[8] = new Option("Juan Vicente Campo Elías");
        Municipio[9] = new Option("La Ceiba");
        Municipio[10] = new Option("Miranda");
        Municipio[11] = new Option("Monte Carmelo");
        Municipio[12] = new Option("Motatán");
        Municipio[13] = new Option("Pampán");
        Municipio[14] = new Option("Pampanito");
        Municipio[15] = new Option("Rafael Rangel");
        Municipio[16] = new Option("San Rafael de Carvajal");
        Municipio[17] = new Option("Sucre");
        Municipio[18] = new Option("Trujillo");
        Municipio[19] = new Option("Urdaneta");
        Municipio[20] = new Option("Valera");
    }
    if(Estado[22].selected == true){//Vargas
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Vargas");
    }
     if(Estado[23].selected == true){//Yaracuy tien la posicion 23 en el array del select estado
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Aristides Bastidas");
        Municipio[2] = new Option("Bolivar");
        Municipio[3] = new Option("Bruzual");
        Municipio[4] = new Option("Cocorote");
        Municipio[5] = new Option("Independencia");
        Municipio[6] = new Option("Jose Antonio Paez");
        Municipio[7] = new Option("La Trinidad");
        Municipio[8] = new Option("Manuel Monge");
        Municipio[9] = new Option("Nirgua");
        Municipio[10] = new Option("Peña");
        Municipio[11] = new Option("San Felipe");
        Municipio[12] = new Option("Sucre");
        Municipio[13] = new Option("Urachiche");
        Municipio[14] = new Option("Veroes");
    }
    if(Estado[24].selected == true){//Zulia
        Municipio[0] = new Option("");
        Municipio[1] = new Option("Almirante Padilla");
        Municipio[2] = new Option("Baralt");
        Municipio[3] = new Option("Cabimas");
        Municipio[4] = new Option("Catatumbo");
        Municipio[5] = new Option("Colón");
        Municipio[6] = new Option("Francisco Javier Pulgar");
        Municipio[7] = new Option("Guajira");
        Municipio[8] = new Option("Jesús María Semprún");
        Municipio[9] = new Option("La Cañada de Urdaneta");
        Municipio[10] = new Option("Lagunillas");
        Municipio[11] = new Option("Lossada");
        Municipio[12] = new Option("Machiques de Perijá");
        Municipio[13] = new Option("Mara");
        Municipio[14] = new Option("Maracaibo");
        Municipio[15] = new Option("Miranda");
        Municipio[16] = new Option("Rosario de Perijá");
        Municipio[17] = new Option("San Francisco");
        Municipio[18] = new Option("Santa Rita");
        Municipio[19] = new Option("Simón Bolívar");
        Municipio[20] = new Option("Sucre");
        Municipio[21] = new Option("Valmore Rodríguez");
    }
}