<?php

function runoile($input) {
	return ucfirst(parsaa($input));
}

function parsaa($input) {
	$fraasit = array(
		"nimi" => array(
			"[asia] = [asia]",
			"[yleisnimen] [yleisnimi] (ital. [yleisnimi])",	
			"[ominaisuus] [yleisnimi]",
			"[yleisnimi]",
			"[yleisnimi], [yleisnimi], [yleisnimi]",
			"[nimeke] [henkilön] muistolle",
			"[asian] [asioita]",
			"[asia] [asiasta]",
			"[paikassa] [ominaisuuksilla] [asioilla]"
		),
		"1" => array(
			"[asia] kuin yön [yleisnimi], joka [yleisnimessä] loistaa.",
			"hän on [asioiden] ja [asian] [yleisnimi], [asian] [asioiden] [yleisnimi] ja [yleisnimi].",
			"yhtäkkiä [asia] vajosi ja jouduin johonkin [ominaisuuteen] [yleisnimeen].",
			"ihmettelin, mikä [yleisnimi] tämä on ja onko täällä ketään.",
			"saapui kerran [asiassa] [henkilö] luokse [henkilön], [ominaisuus] [yleisnimi] [yleisnimessä] [asian] tyyliin.",
			"[erisnimi] [yleisnimen] [asiastansa] otti ja alkoi lukea.",
			"olen kuin [asia] epävireisine [asioineen].",
			"[asia] [ominaisuus] oli aivan, ja tuntea sai monen [yleisnimen].",
			"olen kauan jo kiertänyt [asiassa] tätä [ominaisuutta] [asiaa], vaan tietää ei voi, kuinka kauan.",
			"voin singota kauas, törmätä [yleisnimeen], [yleisnimeen] tai [yleisnimeen].",
			"on [henkilö] [paikassa] [ominaisuus] [yleisnimi] nimeltään, tiedä ei mitään [asiasta] [asian] [yleisnimen].",
			"olit [asian] [yleisnimi], [yleisnimi].",
			"olin [asiana] [paikan] [asialla] [paikassa], siellä minut ensi kerran tapasit [asialla] sanoit: \"Siinä on [ominaisuus] [yleisnimi] ja [ominaisuudet] [asiat]\" niin [asiani] [henkilö] minulle kertoi myöhemmin.",
			"on [asiassa] paljon [asioita], on [yleisnimi], [yleisnimi], [yleisnimi].",
			"riippua [asiassa] kuin [asia] [asian] [yleisnimessä] tai [ominaisuus] [yleisnimi], olla vain olemassa [ominaisuuden] [yleisnimen] kuljettamana, vaikka kaikki on [ominaisuutta], [ominaisuutta] kuin [asian] [yleisnimi] [asioiden] [asioissa], [asian] [ominaisuus] [yleisnimi].",
			"[asiani], se on [ominaisuuksien], [ominaisuuksien] [asioiden] tavoitteleminen.",
			"teen tästä [asiasta] [asian], sellaisen, joka minulta puuttuu.",
			"siellä he [asiat] istuvat ja suutelevat [ominaisuuden] [asian] [yleisnimessä].",
			"päivät [asialla] ajan kauas yli [asian] [yleisnimen].",
			"yhä muistan [yleisnimen] [paikan]. Joka [yleisnimi] siellä kuljettiin, [asioita] [asiaan] heitettiin."
		),
		"2" => array(
			"vaikka [asiat] kohoavat korkealle, [ominaisuus] on [yleisnimi] kuin [asian] [yleisnimi], [ominaisuus] [yleisnimi] [ominaisuudella] [asialla], [asian] [yleisnimi] [ominaisuuden] [yleisnimen] yllä.",
			"yhä loistavat [asiat] kuin [asian] [yleisnimi], [asia] [asiaa] antaa [asian] ja [asioiden] ylle.",
			"hänen on luotava [asiastaan] [ominaisuuksia] [asioita], [asioita] [yleisnimeen] ja [asioihin] olemalla silti [paikassa].",
			"huomasin, että siellä oli [asioita]. Enhän tuntenut heitä.",
			"kuitenkin yksi [ominaisuus], joka vaikutti [asian] näköiseltä, sanoi minulle: vieläkö teet [asioita]?",
			"hän muistutti [asiaa]ni. Kai siellä lie sitten ollut muitakin [asioita]ni.",
			"oli niin kuin [ominaisuudet] [asiat] olisivat reunustaneet sitä [asiaa].",
			"[asioilla] oli [ominaisuuksia] [asioita], joita en ymmärtänyt.",
			"silloin [henkilö] vihoissaan [yleisnimen] [henkilön] [asiasta] sieppas.",
			"no, no, sanoi [henkilö], ja syntyi koko [yleisnimi], ja [henkilö] [asiasta] hyökkäs.",
			"tässä [yleisnimessä] rupes' kaatumaan [yleisnimi] ja [yleisnimi], kun [henkilö] ja [henkilö] sitä vastaan töytää.",
			"sitä soittelen [asiaani], [asiaani], [asiaani] [asioin] ja [asioin] ja laulaakin voin.",
			"[asiat] soittivat [asiaa] ja [asian] [yleisnimessä] loisti [yleisnimi].",
			"Sitten se [yleisnimi] nukahti, ja [asiassa] [asia]kin kukahti.",
			"mitä sitten tapahtuu? Ette tarvitse enää [asioita], ei [asioita] minun [asiani] [asialla].",
			"miksi kaivatte [asiaa], miksi poraatte kaiken [yleisnimen] [asiasta]ni? Ne ovat [asiaksi] teille.",
			"hän [asialla] leikkii ja [asioita] ruokkii, kun [henkilö] [asialla] [asiaa] kuokkii.",
			"kun sitten tapasimme [paikassa], minulla oli jo paljon [asioita], joissa oli myös [asioita] [erisnimen] [asioista].",
			"annoin sinulle [asioita]ni.",
			"[asia], tuo [ominaisuus] [yleisnimi] [ominaisuus] on, kun saapuu [asia], sitä voisitko mennä piilohon, vaan seisotko [asiassa] [asian] alla.",
			"[ominaisuuteen] [yleisnimeen] voi [asiansa] heittää odottamatta mitään.",
			"[yleisnimen] saat sä multa, [asia] on [asiaa].",
			"[ominaisuuden] [yleisnimen] [yleisnimessä] on [ominaisuuden] värinen [yleisnimi], ja [asioille] on ripustettu [yleisnimen][asioita], [yleisnimen][asioita],
[yleisnimen] [asioita], [yleisnimen][asioita], [yleisnimen] [asioita] ja [yleisnimen] [asioita].",
			"keskustelimme [asiasta], joimme [asiaa], ja hän pyysi minua kirjoittamaan [yleisnimen] hänen [asiaansa].",
			"hän piti minun [asioista]ni ja kirjoitti [yleisnimen], jos haen [asioita].",
			"ehkä en enää sitä nähdä saa, vaan [asioissa] kuljen siellä [asian] [asialla]."
		),
		"3" => array(
			"[asiat], jotka valaisevat [ominaisuuksia] [asioita] [asioilta] alas [asioihin] kulkevat kuin [asiat], nopeasti sädehtien [asian] [asiaa].",
			"[asian] ja [asian] [yleisnimi] on [ominaisuutta] hänelle, [yleisnimi] on juotava loppuun tuntematta [asiaa], [ominaisuus] on [asia].",
			"ajattelin, että kuinka pääsen pois täältä. Sitten näin [asiaa] [asioiden] välistä ja pääsin pois.",
			"jouduin [ominaisuudelle], [ominaisuudelle] [asialle], jonka molemmilla [asioilla] kukkivat [ominaisuudet] [asiat].",
			"taitoin yhden [ominaisuuden] [ominaisuudelta] tuoksuvan [yleisnimen] viedäkseni sen [asialle]ni [asian] [asiaksi].",
			"[asia] vei minut [asian] [yleisnimeen], jossa oli [asia].",
			"menin siihen [yleisnimeen], se kulki [ominaisuuden] [yleisnimen] keskelle, jossa [asiat] kovasti keinuttelivat. En kuitenkaan pelännyt.",
			"tuli sitten [ominaisuus] [yleisnimi], [asia] kallistui ja putosin [yleisnimeen] lähelle [asiaa].",
			"ja [asian] luona alkoi taas sama [asian] [yleisnimi], siellä odotti vuoroansa [asia] ja [asia].",
			"lie kaikki tässä [yleisnimessä] mennyt sekaisin, vaan [erisnimi] ja [erisnimi] toisiansa nokisina haroo.",
			"[asia] luo [asiaa], [asian] [ominaisuus] [yleisnimi] lentää korkealle.",
			"Mutta voi, tuli [yleisnimi] ja [yleisnimi], pian [erisnimi] sen kuuli.",
			"[asia] liikkui, ihan katketakseen kiikkui, ja humpsis, [asia] [yleisnimeen] putosi siitä, sanoi: [asiaa] kiitä, vielä ehjin [asioin] ei sattunut [asioin].",
			"minäkin voin olla [ominaisuus], minulla on paljon [asiaa] sisälläni; [asiaa], [asiaa], [asiaa] ja [asiaa].",
			"[asiani] voivat peittää [asioita] ja [asioita] alleen, kuten on tapahtunutkin, ja [asiat].",
			"jo muinoin [asia] purkautui ja hautasi [asian], [asian] ja [asian] [asiat] [asioineen].",
			"siellä kasvaa [asiat] ja monet [ominaisuudet] [asiat] muut.",
			"sanoit pitäväsi minun [asioista] ja että ne ovat [ominaisuuksia].",
			"voi syttyä [asia] ja [asia], on [yleisnimi] [asioille] ja [asioille].",
			"[asiassa] jos [asiasi] näät, voi piankin olla jo [asiat].",
			"juon [asiaa] [asialle], joka on [ominaisuus] [yleisnimi] eikä mitään ole tarpeeksi.",
			"jos [asian] [asioita] kellä [asiassa] on, [yleisnimen] luulevat he saavansa, vaan [asiaa] voi silti olla.",
			"kerran, kun tapasin [nimeke] [henkilön] ja istuimme [ominaisuudessa] [yleisnimessä] vierekkäin, ja kun kerroin hänelle, että olen menossa [nimeke] [henkilölle], hän käski sanoa paljon [asioita] ja sanoi tavanneensa myös hänet aikaisemmin.",
			"ja [asioiden] [ominaisuus] [yleisnimi] tavoittaa [asian] kuin [henkilön] [asiat]."
		),
		"4" => array(
			"mitä olisi [yleisnimi] [henkilön] [yleisnimessä] kauas [ominaisuuteen] [yleisnimeen], [henkilö] voi kuvitella sen omalla tavallaan, [ominaisuus] on hänen [asiansa].",
			"[henkilö] palvoo [asiaa], [asiaa], [asiaa], [asian] [asiaa], [asiaa], ja [asian] [ominaisuudesta] [asiasta] [ominaisuudet] [asiat] sädehtivät [asiaa].",
			"olin [ominaisuus], nukuin [asialle].",
			"heräsin. Kaikki oli ollut vain [asiaa].",
			"se oli käynti [ominaisuudessa] [paikassa].",
			"sellaista se on se [yleisnimi], se on [asioiden] [yleisnimi], sitä tulee varmasti varoa, ettei tulis' [asian] [yleisnimi].",
			"kun se pääsee [asioissa] leimuamaan, onhan se vallan [ominaisuutta], sen tulee olla [ominaisuutta], [ominaisuutta], ei koskaan [ominaisuuden] [ominaisuutta].",
			"toivon siis [ominaisuutta] [asiaa] ja [asiaa]!",
			"[yleisnimi], [asiaa] soivat [asiat] sen, ja [asia] kaikuu [asian] [yleisnimeen].",
			"Kai [asian] [yleisnimeen] pudonnut lie, koska alkoi [ominaisuus] [yleisnimi], ja se [yleisnimi] loikki [ominaisuuden] [asian] poikki.",
			"[asian] [yleisnimeen] kai [henkilö] viimein muuttaa sai, [asialla] nukkua koitti, [asiansa] viimein voitti.",
			"[ominaisuus] on [asiani] [yleisnimi]; [ominaisuudet] [asiat] ja [yleisnimi], [yleisnimi]- ja [yleisnimi][asioineen], [asiat] ja [asiat] ovat [asiaksi] ja [asiaksi].",
			"tämä [yleisnimi] on [asianne] [ominaisuudessa] [yleisnimessä].",
			"minne voisitte muuttaa? Ette [asiaankaan]. Ilman minua ja [asiaa] ette voisi asua [asialla]ni.",
			"pistäkää [asiaanne] [ominaisuus] [yleisnimi] [asianne] onnellistuttamiseksi minun [asiani] [asialla]!",
			"on [yleisnimi] [asiaksi]; tottele en, hän on kuitenkin [ominaisuus] [yleisnimi].",
			"mutta [yleisnimeen] [henkilö] mennä ei saa koska siellä [asia] asustaa.",
			"[ominaisuuden], [ominaisuuden] [yleisnimen] [yleisnimi] säilyy eikä koskaan katoa vaikka [yleisnimi] kuluu.",
			"kunnioitan muistoasi [asiana], [ominaisuutena] [asiana] jolta riitti [asiaa] minullekin.",
			"on [asiassa] [asiaa], [ominaisuudet] ovat [asian] [asiat], niitä [asia] kahlita ei voi.",
			"siellä [yleisnimi] on [ominaisuutta] niin, siis lennä [asian] [asioihin]!",
			"[asia] on osa [asiaa], se kätkeytyy [asiani] [yleisnimeen].",
			"jos joskus [asioihin] käykin [asia], [yleisnimeen] ehkä silloin [asia] vie, [asia] [asian] niin valloittaa ja [yleisnimen]kin saada voi, jos [asia] toi, se [asiaa] on, oi.",
			"[asiat] [asioiden] [asiaa] kantakaa, kunnes haihtuu [asian] [yleisnimi].",
			"muistan hänet usein, ja hänen [asiansa] elävät [yleisnimessä]mme yhä."
		),
		"asia" => array(
			"[erisnimi]", "[yleisnimi]"
		),
		"erisnimi" => array(
			"[henkilö]", "[paikka]"
		),
		"henkilö" => array(
			"Dag Hammarskiöld", "Hidulika", "Ilmari Pimiä", "L. Onerva", "Lyyli", "Olga Frimodig", "Poetessa", "Ufo"
		),
		"paikka" => array(
			"Meilahti", "Vesuvius", "Viipuri"
		),
		"yleisnimi" => array(
			"aika", "asukas", "etana", "hedelmä", "humina", "kahvipannu", "kasvullisuus", "kirjailija", "kukka", "kulkija", "käki", "labyrintti", "laiva", "lamppu", "laulu", "leijona", "maa", "maapallo", "malja", "mandoliini", "matka", "matkailu", "muisto", "musiikki", "pata", "pikkupoika", "pila", "pinta", "poika", "polku", "päivänkakkara", "pöytä", "rakkaus", "rakkausjuttu", "rakkauslaulu", "rouva", "runoilijatar", "sade", "sammakko", "sielu", "siipi", "tie", "tunne", "tuulenpuuska", "tuuli", "tyttö", "tyttönen", "tähti", "varjo", "viisaus", "äiti"
		),
		"nimeke" => array(	
			"kirjailija", "presidentinrouva", "runoilijatar"
		),
		"asiat" => array(	
			"apinanleipäpuut", "eläimet", "hyasintit", "kaupungit", "kielet", "kukat", "laineet", "linnut", "maanjäristykset", "maisemat", "näyt", "posket", "siivet", "sirkat", "säveleet", "tuulet", "tähdet", "vuoret"
		),
		"asiani" => array(	
			"ajatusmaailmani", "elämäni", "kotini", "palloni", "persoonallisuuteni", "runoni", "toivottomuuteni", "tulivuoreni", "tätini", "ystäväni", "äitini", "kukkani", "onneni"
		),
		"asiasi" => array(	
			"ajatusmaailmasi", "elämäsi", "kotisi", "pallosi", "persoonallisuutesi", "runosi", "toivottomuutesi", "tulivuoresi", "tätisi", "ystäväsi", "äitisi", "kukkasi", "onnesi"
		),
		"asiansa" => array(	
			"ajatusmaailmansa", "elämänsä", "kotinsa", "pallonsa", "persoonallisuutensa", "runonsa", "toivottomuutensa", "tulivuorensa", "tätinsä", "ystävänsä", "äitinsä"
		),
		"asianne" => array(	
			"ajatusmaailmanne", "elämänne", "kotinne", "pallonne", "persoonallisuutenne", "runonne", "toivottomuutenne", "tulivuorenne", "tätinne", "ystävänne", "äitinne"
		),
		"asian" => array(
			"[erisnimen]", "[yleisnimen]"
		),
		"erisnimen" => array(	
			"[henkilön]", "[paikan]"
		),
		"henkilön" => array(	
			"Dag Hammarskiöldin", "Hidulikan", "Ilmari Pimiän", "L. Onerva-Madetojan", "Lyylin", "Olga Frimodigin", "Poetessan", "Sylvi Kekkosen", "Ufon", "W. Amadeus Mozartin"
		),
		"paikan" => array(	
			"Herculaneumin", "Italian", "Lapin", "Meilahden", "Monrepoon", "Pompejin", "Puumalan", "Saimaan", "Stabiaen"
		),
		"yleisnimen" => array(	
			"ajatuksen", "auringon", "elämän", "entisajan", "haaveratsun", "hellan", "hyasintin", "ihmisen", "ikävän", "illan", "järven", "jään", "kirjeen", "kärsimyksen", "lumen", "maan", "mandoliinin", "metsälammen", "metsän", "pettymyksen", "pojan", "presidentin", "päivänkakkaran", "rajan", "rakkauden", "runouden", "sammakon", "sielun", "sydämen", "tulipalon", "unen", "unenprinssin", "vaivan", "yksinäisyyden", "äidin", "öljyn"
		),
		"asioiden" => array(	
			"kärsimyksien", "labyrinttien", "sydämien", "tunteiden", "vuorten"
		),
		"asiaa" => array(	
			"aurinkoa", "hyvyyttä", "kaasua", "kaipausta", "kauneutta", "laavaa", "luontoa", "lämpöä", "maata", "neuvoa", "niittypolkua", "onnea", "onnea", "rakkautta", "saarta", "sinfoniaa", "sivistystä", "tuhkaa", "tulta", "tunnetta", "tuskaa", "unta", "uraania", "valoa", "voimaa"
		),
		"asioita" => array(	
			"aiheita", "aseita", "fantasioita", "ihmisiä", "kanoja", "kaupunkeja", "kirjoituksia", "maita", "runohelmiä", "runoja", "sotia", "teitä", "terveisiä", "unelmia", "kukkia"
		),
		"asiana" => array(	
			"ihmisenä", "kirjailijana", "lapsena"
		),
		"asiaksi" => array(
			"etanaksi", "kahvipannuksi", "kirjailijaksi", "käeksi", "labyrintiksi", "mandoliiniksi", "muistoksi", "pikkupojaksi", "päivänkakkaraksi", "rakkaudeksi", "rouvaksi", "runoilijattareksi", "sammakoksi", "sieluksi", "suomeksi", "tyttöseksi", "kukaksi", "onneksi"
		),
		"asiassa" => array(
			"[paikassa]", "[yleisnimessä]"
		),
		"paikassa" => array(
			"Afrikassa", "avaruudessa", "avaruuslaivassa", "Helsingissä", "labyrintissa", "Puumalassa", "Roomassa"
		),
		"yleisnimessä" => array(	
			"illansuussa", "koivussa", "kullassa", "maassa", "mielessä"
		),
		"asioissa" => array(	
			"liekeissä"
		),
		"asiasta" => array(	
			"kädestä", "labyrintista", "lähteestä", "mandoliinista", "merestä", "perästä", "sielusta", "tädistä", "vieraskirjasta"
		),
		"asiastaan" => array(	
			"kädestään", "labyrintistaan", "lähteestään", "mandoliinistaan", "merestään", "perästään", "sielustaan", "tädistään", "vieraskirjastaan", "onnestaan"
		),
		"asiastansa" => array(	
			"kädestänsä", "mandoliinistansa", "perästänsä", "taskustansa", "vieraskirjastansa"
		),
		"asioista" => array(	
			"maisemista", "runoista"
		),
		"asiaan" => array(	
			"[henkilöön]", "[yleisnimeen]"
		),
		"henkilöön" => array(	
			"Hidulikaan", "L. Onerva-Madetojaan", "Lyyliin", "Olga Frimodigiin", "Poetessaan","Sylvi Kekkoseen", "Ufoon", "W. Amadeus Mozartiin"
		),
		"yleisnimeen" => array(	
			"ajatusmaailmaan", "aurinkoon", "hellaan", "järveen", "kuuhun", "labyrinttiin", "laivaan", "maahan", "mandoliiniin", "metsään", "persoonallisuuteen", "päähän", "rantaan", "selkään", "tummuuteen", "tähteen", "tätiin", "vieraskirjaan", "äitiin"
		),
		"asiaani" => array(	
			"ajatusmaailmaani", "elämääni", "ikävääni", "vieraskirjaani", "ystävääni", "onneani"
		),
		"asiaansa" => array(	
			"ajatusmaailmaansa", "aurinkoonsa", "hellaansa", "kuuhunsa", "labyrinttiinsa", "mandoliiniinsa", "palloonsa", "persoonallisuuteensa", "päähänsä", "tätiinsä", "Ufoonsa", "unenprinssiinsä", "vieraskirjaansa", "äitiinsä", "kukkaansa"
		),
		"asiaanne" => array(	
			"ajatusmaailmaanne", "aurinkoonne", "hellaanne", "järveenne", "kuuhunne", "labyrinttiinne", "laivaanne", "maahanne", "mandoliiniinne", "metsäänne", "päähänne", "rantaanne", "selkäänne", "tummuuteenne", "tyyliinne", "tähteenne", "tätiinne", "Ufoonne", "unenprinssiinne", "vieraskirjaanne", "äitiinne"
		),
		"asiaankaan" => array(	
			"ajatusmaailmaankaan", "aurinkoonkaan", "hellaankaan", "järveenkään", "kuuhunkaan", "labyrinttiinkaan", "mandoliiniinkaan", "persoonallisuuteenkaan", "päähänkään", "tätiinkään", "Ufoonkaan", "unenprinssiinkään", "vieraskirjaankaan", "äitiinkään"
		),
		"asioihin" => array(	
			"laaksoihin", "tähtiin"
		),
		"asialla" => array(	
			"haaveratsulla", "kylätiellä", "lumpeenlehdellä", "mandoliinilla", "poliklinikalla", "pallolla", "pellolla", "pihalla", "pinnalla", "rannalla"
		),
		"asiallaan" => array(
			"haaveratsullaan", "lumivalko-orhillaan", "lumpeenlehdellään", "mandoliinillaan", "pallollaan", "tavallaan"
		),
		"asioilla" => array(	
			"kyläteillä", "lumivalko-orhilla", "lumpeenlehdillä", "mandoliineilla", "palloilla", "pelloilla", "pihoilla", "portailla", "rannoilla", "seinillä"
		),
		"asioilta" => array(	
			"oksilta", "seiniltä", "vuorilta"
		),
		"asialle" => array(	
			"Meilahden poliklinikalle", "muistolle", "polulle", "päälle", "rannalle", "tädille"
		),
		"henkilölle" => array(	
			"Ilmari Pimiälle", "L. Onervalle", "Olga Frimodigille", "Sylvi Kekkoselle"
		),
		"asioille" => array(	
			"oksille", "seinille", "vuorille"
		),
		"asioineen" => array(	
			"ajatusmaailmoineen", "ihmisineen", "kielineen", "palloineen", "runoineen", "tarhoineen", "täteineen"
		),
		"asioin" => array(	
			"illoin", "nahoin", "pahoin", "päivin"
		),
		"ominaisuus" => array(	
			"espanjalainen", "fantastinen", "hauras", "julma", "kaunis", "kiltti", "koditon", "loistoinen", "mystinen", "naispuolinen", "näkymätön", "pieni", "pitkä", "suuri", "tuntematon", "viimeinen", "voimakas", "värähtävä", "väsynyt"
		),
		"ominaisuudet" => array(	
			"espanjalaiset", "fantastiset", "henkevät", "ihanat", "kauniit", "kehnot", "korkeat", "monenlaiset", "monenväriset", "mystiset", "oudot", "pimeät", "punaiset", "ylevät"
		),
		"ominaisuuden" => array(	
			"espanjalaisen", "fantastisen", "henkevän", "ihanan", "kauniin", "kehnon", "mystisen", "oudon", "pimeän", "suuren", "syvän", "tuntemattoman", "valkean", "ylevän"
		),
		"ominaisuuksien" => array(
			"fantastisten", "henkevien", "kauniiden", "kehnojen", "suurten", "ylevien"
		),
		"ominaisuutta" => array(	
			"hurjaa", "jaloa", "kaunista", "kukkaista", "kurjaa", "rauhallista", "tuttua", "vihreää"
		),
		"ominaisuuksia" => array(	
			"fantastisia", "kauniita", "mystisiä", "outoja", "pimeitä", "tummia", "uusia", "yleviä"
		),
		"ominaisuutena" => array(	
			"fantastisena", "hyvänä", "kauniina", "mystisenä", "outona", "pimeänä", "ylevänä"
		),
		"ominaisuudessa" => array(	
			"espanjalaisessa", "fantastisessa", "henkevässä", "ihanassa", "kauniissa", "mystisessä", "oudossa", "pimeässä", "suuressa", "syvässä", "tuntemattomassa", "ylevässä"
		),
		"ominaisuudesta" => array(	
			"espanjalaisesta", "fantastisesta", "henkevästä", "ihanasta", "kauniista", "mystisestä", "oudosta", "pimeästä", "syvästä", "tuntemattomasta", "ylevästä"
		),
		"ominaisuuteen" => array(	
			"espanjalaiseen", "fantastiseen", "henkevään", "ihanaan", "kauniiseen", "mystiseen", "outoon", "pimeään", "tuntemattomaan", "ylevään"
		),
		"ominaisuuksilla" => array(
			"espanjalaisilla", "fantastisilla", "henkevillä", "ihanilla", "mystisillä", "oudoilla", "pimeillä", "ylevillä"
		),
		"ominaisuudelta" => array(	
			"espanjalaiselta", "fantastiselta", "henkevältä", "ihanalta", "kauniilta", "mystiseltä", "oudolta", "pimeältä", "ylevältä"
		),
		"ominaisuudelle" => array(	
			"espanjalaiselle", "fantastiselle", "henkevälle", "ihanalle", "kauniille", "mystiselle", "oudolle", "pimeälle", "uudelle", "ylevälle"
		)	
	);
	
   $regex = '/(\[)([\wöä ]+)(])/';

   if (is_array($input)) {
		$keyword = $input[2];
		$i = rand(0, count($fraasit[$keyword])-1);
		$input = $fraasit[$keyword][$i];
   }

   return preg_replace_callback($regex, 'parsaa', $input);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Sähköpaganus</title>
	<meta name = "viewport" content = "width = device-width, user-scalable = no">
	<style type="text/css">
	body{
		margin:0;
		padding:0px;
	}
	#runo{
		width:280px;
		min-height:316px;
		margin:0 auto;
		padding:20px;
		font-family:"Andale mono", monospace;
		background:url(tausta.gif) top center;
	}
	h1, p{
		font-size:14px;
		line-height:20px;
		margin:0;
	}
	h1{
		font-weight:normal;
		text-transform:uppercase;
		margin:0 0 20px;
	}
	</style>
</head>

<body>
	<div id="runo">
		<h1><?php echo runoile("[nimi]"); ?></h1>
		<p>
			<?php echo runoile("[1]"); ?>
			<?php echo runoile("[2]"); ?>
			<?php echo runoile("[3]"); ?>
			<?php echo runoile("[4]"); ?>
		</p>
	</div>
</body>
</html>