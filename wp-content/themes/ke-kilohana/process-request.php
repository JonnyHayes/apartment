<?php
if(isset($_POST["country"])){
    // Capture selected country
    $country = $_POST["country"];
     
    // Define country and city array
    $countryArr = array(
                    "US" => array(" value='AL'>Alabama"," value='AK'>Alaska"," value='AZ'>Arizona"," value='AR'>Arkansas"," value='CA'>California"," value='CO'>Colorado"," value='CT'>Connecticut"," value='DE'>Delaware"," value='FL'>Florida"," value='GA'>Georgia"," value='HI' selected>Hawaii"," value='ID'>Idaho"," value='IL'>Illinois"," value='IN'>Indiana"," value='IA'>Iowa"," value='KS'>Kansas"," value='KY'>Kentucky"," value='LA'>Louisiana"," value='ME'>Maine"," value='MD'>Maryland"," value='MA'>Massachusetts"," value='MI'>Michigan"," value='MN'>Minnesota"," value='MS'>Mississippi"," value='MO'>Missouri"," value='MT'>Montana"," value='NE'>Nebraska"," value='NV'>Nevada"," value='NH'>New Hampshire"," value='NJ'>New Jersey"," value='NM'>New Mexico"," value='NY'>New York"," value='NC'>North Carolina"," value='ND'>North Dakota"," value='OH'>Ohio"," value='OK'>Oklahoma"," value='OR'>Oregon"," value='PA'>Pennsylvania"," value='RI'>Rhode Island"," value='SC'>South Carolina"," value='SD'>South Dakota"," value='TN'>Tennessee"," value='TX'>Texas"," value='UT'>Utah"," value='VT'>Vermont"," value='VA'>Virginia"," value='WA'>Washington"," value='WV'>West Virginia"," value='WI'>Wisconsin"," value='WY'>Wyoming"),
        
        "AU" => array(" value='ACT'>Australian Capital Territory"," value='NSW'>New South Wales"," value='NT'>Northern Territory"," value='QLD'>Queensland"," value='SA'>South Australia"," value='TAS'>Tasmania"," value='VIC'>Victoria"," value='WA'>Western Australia"),
        
      "CA" => array(  " value='AB'>Alberta"," value='BC'>British Columbia"," value='MB'>Manitoba"," value='NB'>New Brunswick"," value='NL'>Newfoundland and Labrador"," value='NT'>Northwest Territories"," value='NS'>Nova Scotia"," value='NU'>Nunavut"," value='ON'>Ontario"," value='PE'>Prince Edward Island"," value='QC'>Quebec"," value='SK'>Saskatchewan"," value='YT'>Yukon Territories"),
        
        "CN" => array (" value='ANH'>Anhui"," value='BEI'>Beijing"," value='CHO'>Chongqing"," value='FUJ'>Fujian"," value='GAN'>Gansu"," value='GDG'>Guangdong"," value='GXI'>Guangxi"," value='GUI'>Guizhou"," value='HAI'>Hainan"," value='HEB'>Hebei"," value='HEI'>Heilongjiang"," value='HEN'>Henan"," value='HUB'>Hubei"," value='HUN'>Hunan"," value='JSU'>Jiangsu"," value='JXI'>Jiangxi"," value='JIL'>Jilin"," value='LIA'>Liaoning"," value='MON'>Nei Mongol"," value='NIN'>Ningxia"," value='QIN'>Qinghai"," value='SHA'>Shaanxi"," value='SHD'>Shandong"," value='SHH'>Shanghai"," value='SHX'>Shanxi"," value='SIC'>Sichuan"," value='TIA'>Tianjin"," value='XIN'>Xinjiang"," value='XIZ'>Xizang"," value='YUN'>Yunnan"," value='ZHE'>Zhejiang"),
        
        
        
        "IN" => array ("value='AN'>Andaman and Nicobar Islands"," value='AP'>Andhra Pradesh"," value='AR'>Arunachal Pradesh"," value='AS'>Assam"," value='BR'>Bihar"," value='CH'>Chandigarh"," value='CT'>Chhattisgarh"," value='DN'>Dadra and Nagar Haveli"," value='DD'>Daman and Diu"," value='DL'>Delhi"," value='GA'>Goa"," value='GJ'>Gujarat"," value='HR'>Haryana"," value='HP'>Himachal Pradesh"," value='JK'>Jammu and Kashmir"," value='JH'>Jharkhand"," value='KA'>Karnataka"," value='KL'>Kerala"," value='LD'>Lakshadweep"," value='MP'>Madhya Pradesh"," value='MH'>Maharashtra"," value='ME'>Meghalaya"," value='MN'>Manipur"," value='MZ'>Mizoram"," value='NL'>Nagaland"," value='OR'>Odisha"," value='PY'>Puducherry"," value='PB'>Punjab"," value='RJ'>Rajasthan"," value='SK'>Sikkim"," value='TN'>Tamil Nadu"," value='TR'>Tripura"," value='UT'>Uttarakhand"," value='UP'>Uttar Pradesh"," value='WB'>West Bengal"," value='"," value='"," value='"," value='"," value='"," value='"),
        
        "IT" => array (" value='AG'>Agrigento"," value='AL'>Alessandria"," value='AN'>Ancona"," value='AO'>Aosta"," value='AP'>Ascoli Piceno"," value='AQ'>L'Aquila"," value='AR'>Arezzo"," value='AT'>Asti"," value='AV'>Avellino"," value='BA'>Bari"," value='BG'>Bergamo"," value='BI'>Biell"," value='BL'>Belluno"," value='BN'>Benevento"," value='BO'>Bologna"," value='BR'>Brindisi"," value='BS'>Brescia"," value='BT'>Barletta-Andria-Trani"," value='BZ'>Bolzano"," value='CA'>Cagliari"," value='CB'>Campobasso"," value='CE'>Caserta"," value='CH'>Chieti"," value='CI'>Carbonia-Iglesias"," value='CL'>Caltanissetta"," value='CN'>Cuneo"," value='CO'>Como"," value='CR'>Cremona"," value='CS'>Cosenza"," value='CT'>Catania"," value='CZ'>Catanzaro"," value='EN'>Enna"," value='FC'>Forl-Cesena"," value='FE'>Ferrara"," value='FG'>Foggia"," value='FI'>Florence"," value='FM'>Fermo"," value='FR'>Frosinone"," value='GE'>Genoa"," value='GO'>Gorizia"," value='GR'>Grosseto"," value='IM'>Imperia"," value='IS'>Isernia"," value='KR'>Crotone"," value='LC'>Lecco"," value='LE'>Lecce"," value='LI'>Livorno"," value='LO'>Lodi"," value='LT'>Latina"," value='LU'>Lucca"," value='MB'>Monza and Brianza"," value='MC'>Macerata"," value='ME'>Messina"," value='MI'>Milan"," value='MN'>Mantua"," value='MO'>Modena"," value='MS'>Massa and Carrara"," value='MT'>Matera"," value='NA'>Naples"," value='NO'>Novara"," value='NU'>Nuoro"," value='OG'>Ogliastra"," value='OR'>Oristano"," value='OT'>Olbia-Tempio"," value='PA'>Palermo"," value='PC'>Piacenza"," value='PD'>Padua"," value='PE'>Pescara"," value='PG'>Perugia"," value='PI'>Pisa"," value='PN'>Pordenone"," value='PO'>Prato"," value='PR'>Parma"," value='PT'>Pistoia"," value='PU'>Pesaro and Urbino"," value='PV'>Pavia"," value='PZ'>Potenza"," value='RA'>Ravenna"," value='RC'>Reggio Calabria"," value='RE'>Reggio Emilia"," value='RG'>Ragusa"," value='RI'>Rieti"," value='RM'>Rome"," value='RN'>Rimini"," value='RO'>Rovigo"," value='SA'>Salerno"," value='SI'>Siena"," value='SO'>Sondrio"," value='SP'>La Spezia"," value='SR'>Syracuse"," value='SS'>Sassari"," value='SV'>Savona"," value='TA'>Taranto"," value='TE'>Teramo"," value='TN'>Trento"," value='TO'>Turin"," value='TP'>Trapani"," value='TR'>Terni"," value='TS'>Trieste"," value='TV'>Treviso"," value='UD'>Udine"," value='VA'>Varese"," value='VB'>Verbano-Cusio-Ossola"," value='VC'>Vercelli"," value='VE'>Venice"," value='VI'>Vicenza"," value='VR'>Verona"," value='VS'>Medio Campidano"," value='VT'>Viterbo"," value='VV'>Vibo Valentia"," value='"," value='"," value='"),
        
        "JP" => array (" value='AKT'>Akita'"," value='AMR'>Aomori'"," value='CHB'>Chiba'"," value='EHM'>Ehime'"," value='FUK'>Fukui'"," value='FKK'>Fukuoka'"," value='FKS'>Fukushima'"," value='GIF'>Gifu'"," value='GUM'>Gunma'"," value='HRS'>Hiroshima'"," value='HKD'>Hokkaido'"," value='HYG'>Hyogo'"," value='IBR'>Ibaraki'"," value='ISK'>Ishikawa'"," value='IWT'>Iwate'"," value='KGW'>Kagawa'"," value='KGS'>Kagoshima'"," value='KNG'>Kanagawa'"," value='KOC'>Kochi'"," value='KMM'>Kumamoto'"," value='KYT'>Kyoto'"," value='MIE'>Mie'"," value='MYG'>Miyagi'"," value='MYZ'>Miyazaki'"," value='NGN'>Nagano'"," value='NGS'>Nagasaki'"," value='NAR'>Nara'"," value='NGT'>Niigata'"," value='OIT'>Oita'"," value='OKY'>Okayama'"," value='OKN'>Okinawa'"," value='OSK'>Osaka'"," value='SAG'>Saga'"," value='STM'>Saitama'"," value='SHG'>Shiga'"," value='SMN'>Shimane'"," value='SZO'>Shizuoka'"," value='TCG'>Tochigi'"," value='TKS'>Tokushima'"," value='TOK'>Tokyo'"," value='TGR'>Tottori'"," value='TYM'>Toyama'"," value='WKY'>Wakayama'"," value='YMT'>Yamagata'"," value='YMG'>Yamaguchi'"," value='YMN'>Yamanashi'"," value='ACH'>Aichi'"," value=''"," value=''"," value=''"," value=''"," value=''"),
        
        "ZA" => array (" value=EC'>Eastern Cape"," value=FS'>Free State"," value=GT'>Gauteng"," value=NL'>KwaZulu-Natal"," value=LP'>Limpopo"," value=MP'>Mpumalanga"," value=NC'>Northern Cape"," value=NW'>North West"," value=WC'>Western Cape")
        
        

        
        
        
                    //"IN" => array("Mumbai", "New Delhi", "Bangalore"),
                    //"GB" => array("London", "Manchester", "Liverpool")
                );
     $countyAbv = array (
     
     );
    // Display city dropdown based on country name
    if($country !== 'Select'){
        
        echo "<select name='00Ni000000FlJ6F' id='00Ni000000FlJ6F' class='form-control bfh-states' placeholder='State' data-country='US' data-state='HI'>";
        foreach($countryArr[$country] as $value){
            echo "<option". $value . "</option>";
        }
        echo "</select>";
    } 
}
?>


