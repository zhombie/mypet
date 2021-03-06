<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}

	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css"></link>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
	<script type="text/javascript" src="js/poleznoe_js.js"></script>

</head>
<body>
	<div class="total_poleznoe">
		<div class="header container-fluid">
			<div class="container">
				<div class="in_header">
					<a href="index.php">
						<div class="logo">
							<p>mypet</p>
						</div>
					</a>

					<div class="right_header">
						<ul class="navbar_list">
							<li class="other"><a href="index.php">главная</a></li>
							<li class="other"><a href="cabinet.php">кабинет</a></li>
							<li class="other"><a href="poleznoe.php">полезное</a></li>
							<li class="login_button"><a href="logout.php?logout">выйти</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="poleznoe_textarea">
				<div class="row">
					<div class="col-lg-2 col-lg-offset-1">
						<ul class="nav nav-pills nav-stacked" id="menu">
							<li class="active"><a href="dog.php">Собака</a></li>
							<li><a href="cat.php">Кот</a></li>
							<li><a href="fish.php">Рыбы</a></li>
							<li><a href="bird.php">Птица</a></li>
							<li><a href="gnawing.php">Грызуны</a></li>
						</ul>
					</div>

					<div class="col-lg-8 text_full">
						<div id="dog" class="content">
						    <b>Кормление</b>
						    <p>
						    	Правильно составленное меню собаки содержит 2/3 мясо продуктов и 1/3 растительной пищи. 
						    	Миска с водой всегда должна быть доступна, тем более при кормлении сухими кормами. 
						    	Мясо и субпродукты(куриные потроха, ноги, головы, печенка, почки и пр.) давайте только после горячей обработки и порезанное. 
						    	Добавкой к мясу может служить варёный рис, гречка, можно давать геркулес, запаренный на нежирном мясном бульоне, 
						    	но не часто-геркулес достаточно бесполезная крупа для собаки. Вместо мяса можно давать вареную рыбу, крупные кости и плавники удаляются. 
						    	Взрослой собаке лучше давать кисломолочные продукты, поскольку лактоза, содержащаяся в молоке, 
						    	не расщепляется собачьим организмом (за исключением организма щенков). Щенкам обязательно давать нежирный творог, 
						    	как источник кальция. Щенку следует давать овощные и фруктовые пюре – как источник витаминов и биологически активных веществ. 
						    	Взрослые собаки обычно получают их с сухими кормами.
						    </p>

						    <b>Чего нельзя давать и по какой причине</b>
						    <ul>
						    	<li>Густую плотную кашу, свежий хлеб – это плохо переваривается, почти не усваивается, создает хорошие условия для существования глистов.</li>

						    	<li>Колбасу, копчености, ветчину, магазинные котлеты и пельмени, мясные консервы – в них высокое содержание соли, острые специи, консерванты; 
						    	последствия – гастрит, язва желудка, холецистит.</li>

								<li>Любые вареные кости, сырые трубчатые кости и ребра, кости птицы – вареные кости не разрушаются под действием желудочного сока ; 
								трубчатые кости раскалываются при раскусывании вдоль, острыми углами – это ведет к травмам желудка и кишечника и могут привести к гибели собаки.</li>

								<li>Горох, фасоль, капуста – очень грубая клетчатка, большое количество неперивариваемых веществ –вызывают брожение, усиленное газоотделение.</li>
						    </ul>

						    <b>Воспитание</b>
						    <p>
						    	Собаку нужно воспитывать с первого дня. Не кричать, не дергать, ни в коем случае не бить! Собака переживает огромный стресс – незнакомое место, 
						    	незнакомые люди, запахи – все непривычно и пугает. Ласка и ваша любовь помогут вам отогреть собачью душу и она ответит вам искренней любовью 
						    	и преданностью.В запретах и разрешениях нужно соблюдать постоянство ( команды «можно», «хорошо»- «нельзя», «фу»).Наказание – строгий тон, 
						    	шлепок по крупу газетой. Ни в коем случае не наказывайте собаку рукой! Наказание должно проводиться только в момент проступка! 
						    	Но никогда, ни за какой самый суровый проступок не наказывайте собаку на ее месте – это ее надежное убежище. В качестве поощрения можно 
						    	использовать сухарики, кусочки сыра, сухофрукты. Если вы взяли собаку впервые, запомните несколько общих правил: - нельзя поднимать щенка за 
						    	передние лапы и за шкирку; - нельзя отводить передние лапы вбок от туловища; - нельзя брать щенка на кресла и другие возвышения. Не разрешайте 
						    	ему спрыгнуть оттуда. Но и в этом возрасте ему может быть позволено влезать на них до тех пор, пока щенок не сможет самостоятельно забираться 
						    	только на ту мягкую мебель, на которую, как вы твердо решили, и взрослой собаке это будет можно.; - для собаки не важен внешний вид и цвет пищи, 
						    	вкуса она тоже не оценит, т.к. почти не чувствует его. Зато в запахе пищи собака различает миллиарды тончайших оттенков; - в желудочном соке 
						    	собаке нет ферментов, расщепляющих клетчатку – поэтому овощи следует давать в тертом виде.
						    </p>

						    <b>Щенку и взрослой собаке нужно проводить следующие процедуры</b>

						    <ul>
						    	<li>
						    		Дегельминтизация 1 раз в 6 месяцев. Двукратно, с интервалом 10 дней дать глистогонное средство (нарп. Паразител). 
						    		Не применяйте для гельминтизации Дронтал, этот препарат дает сильную интоксикацию и может быть смертельно опасным для щенка.
						    	</li>
						    	<li>
						    		Помните, что на весну и лето приходится пик активной деятельности эктопаразитов (блох, клещей, вшей и власоедов), являющихся 
						    		переносчиками многих инвазионных и инфекционных болезней. Поэтому необходимо своевременно проводить профилактику 
						    		(напр. Барс, Фронтлайн, Стронгхолд и пр.)
						    	</li>
						    	<li>
						    		Единственным эффективным методом борьбы с инфекционными болезнями являются профилактические прививки. Первая вакцинация 
						    		щенка проводится в возрасте 2 месяца. Затем через 3 недели проводится повторная вакцинация. Следующая вакцинация щенка делается в полгода. 
						    		После этого животное вакцинируют 1 раз в год. Вакцинация проводится только здоровому животному! Не позже, чем за 14 дней до вакцинации 
						    		проводится дегельминтизация.
						    	</li>
						    </ul>
						    <p>
					    		<span class="glyphicon glyphicon-exclamation-sign"></span>
					    		Если Ваш щенок плохо себя чувствует, его необходимо показать ветеринарному врачу. Отнеситесь серьезно к выбору ветеринара. 
					    		Обратитесь за рекомендациями к своим знакомым или опекуну щенка. Лучше перестраховаться и проконсультироваться у еще одного врача.	
						    </p>
						    <p>
						    	Несколько советов, чтобы ваша собака не терялась 
						    </p>
						    <ul>
						    	<li>
						    		Не выводите собаку без поводка;
						    	</li>
						    	<li>
						    		Не привязывайте собаку у магазинов, когда идете за покупками, рано или поздно это кончится трагедией;
						    	</li>
						    	<li>
						    		Прикрепите к ошейнику пластинку с номером телефона и вашим адресом (адресник) или повесьте его на цепочку которую никогда не снимайте. 
						    		Для выгуливания надевайте ещё один полноценный ошейник к оторому и крепите поводок.
						    	</li>
						    </ul>
						</div>
						<div id="cat" class="content">
						    <b>Питание</b>
						    <p>
						    	У вашего питомца должно быть постоянное место для столовой. Традиционно находится уголок на кухне, только смотрите, 
						    	чтобы под ногами не мешались ни миски, ни вытянутый хвост безмятежно обедающей кошки. Что едим? Анфиса — кошка советского времени, 
						    	к тому же выросшая на севере, поэтому ест только минтай. Вареный, конечно, сырую рыбу лучше не давать — в ней много паразитов. 
						    	Еще любит сырую курятинку и мясо, гурман, в общем. :) Фроська — новое поколение, питается готовыми кормами. Но изыски любит не меньше. 
						    	Например, обязателен утром кусочек плавленого сыра, без него завтрак — уже не завтрак. Еще обожает мороженое, 
						    	только давать его надо подтаявшим и совсем немножко — со сладкого может прослабить. Общие же рекомендации вкратце таковы: 
						    	обязательно должно стоять блюдце с чистой водой, рядом — тарелочка сухого корма: это очень хорошо, когда киса уверена, 
						    	что в любое время она может слегка перекусить; утром и вечером — влажный корм. Советуют давать корм одной марки, 
						    	тогда питание получается наиболее сбалансированным. Правда, со временем приедается любой, даже самый дорогой корм, 
						    	и тогда необходимо поэкпериментировать с другими вкусами, а иногда и фирмами. Каждый день мойте миску из-под влажного корма, 
						    	не съеденный — убирайте в холодильник. Приятного аппетита!
						    </p>

						    <b>Игрушки и когти</b>
						    <p>
						    	Ребенок есть ребенок, и ему необходимо играть. Не стоит особо напрягаться в магазинах — котенок будет безмерно рад бумажному шарику, 
						    	мячику для настольного тенниса (он так здорово отпрыгивает от пола, просто классс!) и небольшой меховой мышке 
						    	(особенно с пищалкой — многие просто балдеют от этого звука). Анфиска обожала наперстки, перетаскала их у мамы уйму, 
						    	причем ни одного из них мы так и не нашли. Ну и, конечно, старые перчатки и варежки (но только вязаные шерстяные, 
						    	пухом котенок может подавиться). У Фроськи есть особая злобная перчатка, которую она всюду таскает за собой в зубах с диким урчанием. 
						    	А уж когда эту перчатку кидают и ее надо поймать — восторгу просто нет предела, прыжки почти до потолка. И вообще почаще играйте 
						    	со своим питомцем, даже взрослым, можно еще купить лазерную указку и ваш друг будет со скрипом тормозов носиться за ярким пятнышком 
						    	на ковре (только осторожно — следите, чтобы лазер не попадал ему в глаза). В солнечную погоду в этой роли может выступать обычное зеркальце.
						    </p>
						    <p>
						    	Обязательно сделайте точилку для когтей маленького непоседы. Приучать к ней надо терпеливо и настойчиво, почаще подносить к досочке, 
						    	ласково уговаривать, ставить на нее лапками, чтобы малыш почувствовал всю прелесть новой забавы. Не всем кошкам нравятся специальные 
						    	готовые точилки, некоторые предпочитают обычные деревяшки, ну а Фроська по-достоинству оценила обитую тканью доску от старого дивана. 
						    	Доска длинная и приделана к стене горкой, так что получился своеобразный тренажер, на котором можно не только привести коготки в порядок, 
						    	но и вволю побеситься. У Анфиски в этой роли выступал старый стул с обтянутой спинкой, она вертелась на нем как на турнике. Вообще, 
						    	если не выпускать кису на улицу, то за когтями нужен особый уход — они отрастают с такой скоростью, что их обтачивание не дает 100%-го 
						    	результата и кошка начинает испытывать дискомфорт. Мы Фросе стараемся их систематически подстригать, но делать это нужно крайне 
						    	осторожно — часть коготка у основания занимает кровеносный сосудик, поэтому мы состригаем самый кончик, чтобы ничего не повредить. 
						    	Поверьте, лучше стричь чаще, чем изуродовать лапку. Тем более что со временем Фроська привыкла к этой процедуре и не высказывает 
						    	более очень уж сильного недовольства. Если боитесь сами — сходите к ветеринару, он покажет, что к чему.
						    </p>
						</div>
						<div id="fish" class="content">
						    <b>Аквариум</b>
						    <p>
						    	Покупка аквариума — это самый первый шаг на пути к созданию живого уголка. Форма и размеры устройства очень важны. 
						    	Хороший аквариум не мешает дома и гарантирует комфорт. Кроме того, он должен обеспечивать нормальное существование рыбкам. 
						    	При покупке надо учесть, что в крупных емкостях вода дольше остается чистой. Уход за аквариумом большого размера требуется выполнять реже. 
						    	Аквариум следует подбирать под размеры и количество рыбок. Если вы хотите созерцать крупных рыб, то для них надо сделать большой дом. 
						    	Ландшафтный дизайн аквариума также требует продуманного подхода. Украсить домашний водоем можно грунтом, водорослями, 
						    	камнями и различными фигурками. Форма аквариума должна обеспечивать удобную чистку.
						    </p>

						    <b>Уход</b>
						    <p>
						    	Уход за рыбками в аквариуме включает следующие регулярные действия: содержание аквариума в чистоте; 
						    	своевременное частичное обновление воды (в маленьком аквариуме — раз в неделю, в большом — раз в месяц); 
						    	внутреннюю поверхность аквариума надо очищать специальным скребком; грунт должен быть в хорошем состоянии. 
						    	Это основные принципы ухода за рыбками в аквариуме. Важное значение имеет качество воды. В процессе своей жизнедеятельности рыбки 
						    	выделяют вредные вещества. Часть из них перерабатывают растения. Но излишек плохих компонентов все же накапливается. 
						    	Поэтому правила ухода за аквариумом надо соблюдать.
						    </p>
						</div>
						<div id="bird" class="content">
						    <b>Клетка</b>
						    <p>
						    	Традиционным помещением для домашней птахи является клетка. Её подбирают исходя из размеров питомца: чем крупнее птица, 
						    	тем больше жилище. Учитывайте, что в нём должны свободно разместиться кормушка, поилка, купалка, жёрдочки, игрушки, гнездовой ящик.
						    	Оптимальными по конструкции считаются прямоугольные, вытянутые в длину либо широкие высокие клети. Клетки с прямой крышей удобны и тем, 
						    	что их можно ставить одна на другую, тем самым экономя место в комнате. 
						    </p>
						    <p>
						    	Нежелательны «домики» с округлым верхом и бесполезными деталями типа «крылечек», «окошек», «башенок» и прочими излишествами, 
						    	которые затрудняют уборку клетки, способствуют скоплению грязи и размножению паразитов. 
						    </p>
						    <p>
						    	Клетки изготавливаются из металла (кроме меди), дерева, органического или силикатного стекла, пластмассы, 
						    	либо делаются комбинированными, например, каркас — из дерева, прутья — из стальной проволоки. 
						    </p>
						    <p>
						    	Лучше всего использовать цельнометаллические клетки, особенно никелированные: они прочны, долговечны, 
						    	не поддаются птице с мощным клювом, легко отмываются от загрязнений, а при обработке кипятком и дезинфицирующими растворами не повреждаются. 
						    	Единственный их недостаток в том, что почти при каждом передвижении птицы издаётся шум. 
						    </p>
						    <p>
						    	Чистота птичьего жилища — залог благополучной и здоровой жизни пернатого. Остатки корма, неубранный помёт, 
						    	скопления загрязнений в труднодоступных уголках «домика» — это прекрасная среда для размножения болезнетворных микробов, 
						    	а также птичьего клеща, пухопероеда и прочих паразитов. Чтобы предупредить инфекционные, кишечные и другие заболевания у птицы, 
						    	клетку надо регулярно чистить и дезинфицировать, и чем больше крылатых питомцев, тем чаще. 
						    </p>
						    <p>
						    	Каждодневного мытья требуют кормушки, поилка и ванночка для купания. Эти предметы должны соответствовать размеру птицы и 
						    	свободно извлекаться из клетки. Желательно использовать посуду из керамики, пластмассы, нержавеющей стали, фаянса — изделия 
						    	из таких материалов проще мыть и обеззараживать. Поилку и кормушки размещайте подальше друг от друга, чтобы в питьё не попадала пища, 
						    	а ещё лучше для подачи воды воспользуйтесь автопоилкой, имеющей закрытую конструкцию. Воду в поилках и купальнях меняют ежедневно, 
						    	в жаркие дни — дважды в день. 
						    </p>

						    <b>Кормление</b>
						    <p>
						    	Декоративные птицы, живущие в наших квартирах, условно называются зерноядными, то есть основу их рациона составляют разные виды 
						    	зерна — овёс, просо, пшеница, канареечное семя и т.д. Готовые кормовые смеси уже обогащены витаминами и минералами, 
						    	но если любимцу всё время давать только такой корм, то данное кормление будет считаться однообразным и может привести 
						    	нарушению обмена веществ и различным заболеваниям, ведь пернатым необходима свежая растительность и животный белок. 
						    </p>
						    <p>
						    	Ежедневное питание клеточных птиц включает в себя злаковую смесь, семена различных растений, например, диких злаковых трав, 
						    	одуванчика, подорожника, и свежий корм. К последнему относятся разнообразные фрукты и ягоды, свекла, морковь, капуста, 
						    	листья салата, мокрицы, одуванчика, крапивы, подорожника. Размер порции основного корма определяется опытным путём. 
						    	Обычно мелким птицам величиной с канарейку дают чайную ложку зерна, более крупным — от полутора чайных ложек.
						    </p>
						    <p>
						    	Раз в неделю в рацион пернатых вводят животный белок — размельчённое варёное яйцо, обезжиренный творог, кусочек мяса. 
						    	Во время линьки белковую пищу скармливают дважды в неделю, а в период яйцекладки, выращивания птенцов и роста молодняка — ежедневно. 
						    	В эти периоды жизни, а также болеющим и старым птицам обязательно дают витаминные препараты. Витамины необходимы и при 
						    	отсутствии в питании свежих овощей, фруктов и зелени.
						    </p>
						    <p>
						    	В рацион крылатых друзей необходимо понемногу добавлять семена масличных культур — подсолнечника, конопли, мака, 
						    	а также различные орехи. Этот вид пищи содержит большое количество важных для птиц жирных кислот, но излишек масличных 
						    	приводит к ожирению. Регулярно предлагайте питомцу свежие веточки в коре с листьями или почками, например, берёзы, яблони или вишни. 
						    	Нельзя забывать о минеральных добавках: это может быть высушенная измельчённая скорлупа яиц или готовый минеральный камень, 
						    	который можно купить в зоомагазине. 
						    </p>
						    <p>
						    	Ещё раз о воде: питьё у комнатных пернатых всегда должно быть свежим. Им следует давать фильтрованную или отстоявшуюся воду.
						    </p>
						</div>
						<div id="gnawing" class="content">
						    <b>Содержание</b>
						    <p>
						    	По правилам для содержания этого юркого зверька необходима специальная клетка. 
						    	Выбрать следует более просторную, хотя по стандартам на одно животное достаточно «помещения» пространством в 40 квадратных см. 
						    	Желательно, чтобы сетка была сделана из прочного металла, а дно клетки – из пластика. За такой «квартиркой» любимца легче ухаживать. 
						    	Ведь придется часто менять подстилки, и вымывать дно. От клетки из дерева лучше отказаться по понятным 
						    	причинам – крысы очень часто ходят в туалет.
						    </p>
						    <p>
						    	На дно просторной норки следует постелить соломку, выстлать опилками или периодически приобретать специализированный настил для клеток, 
						    	в которых содержатся грызуны. Не стоит пользоваться мелкой древесной стружкой. Она будет быстро налипать на шкурку и лапки животного, 
						    	отчего оно станет казаться грязным.
						    </p>
						    <p>
						    	Крыску рекомендовано выпускать на прогулки по дому. Разумеется, под строгим контролем хозяев. 
						    	Постоянное сидение в клетке плохо влияет на самочувствие любимца.
						    </p>
						    <p>
						    	Кормить зверька можно продукцией из зоомагазина, специально предназначенной для этих целей. 
						    	Наполовину или даже более такие смеси состоят из углеводов, на четверть - из белка, остальное жиры. 
						    	Крыски кушают не все. Что предпочтет Ваш любимец можно выяснить только после того, как он поселится в Вашем доме.
						    </p>
						    <p>
						    	У питомца постоянно должен быть доступ к питьевой воде. Поилку необходимо подвешивать или ставить мисочку на пол. 
						    	Диаметр дна поилки не должен быть меньше диаметрам ее края. Менять содержимое и мыть емкость нужно несколько раз в день. 
						    	Воду стоит выбирать наиболее качественную.
						    </p>
						    <p>
						    	Средняя продолжительность жизни крысы, которая находится в неволе, 2,5-3 года. Поскольку нормальная температура 
						    	тела здорового зверька намного выше человеческой и доходит до 38oС, в доме крыске необходимо создать особенно комфортные условия, 
						    	чтобы она ни в коем случае не мерзла, не голодала и не страдала от жажды. Температура воздуха в комнате, где живет питомец, должна 
						    	достигать 20-21oC, при влажности 60%. Чтобы повысить влажность стоит применять специализированные распылители воды или завести 
						    	побольше комнатных цветов.
						    </p>

						    <b>Здоровье</b>
						    <p>
						    	Образцом отменного здоровья любого грызуна считается здоровая шерсть, активное поведение и всегда любопытные глаза. 
						    	Для здоровья животного в первую очередь должна соблюдаться гигиена места обитания. Место туалета нужно менять каждый день, 
						    	а клетку вычищать регулярно. При уборке или мытье клетки, не следует применять агрессивные моющие средства. Они могут 
						    	навредить грызуну и вызывать пищевое отравление, вплоть до летального исхода.
						    </p>

						    <br>

						    <b>Факторы, влияющие на здоровье питомца:</b>
						    <ul>
						    	<li>
						    		Неправильное питание, в том числе и перекармливание животного.
						    	</li>
						    	<li>
						    		Стресс.
						    	</li>
						    	<li>
						    		Неприемлемые условия проживания (тесная клетка или нерегулярная ее чистка).
						    	</li>
						    </ul>

						    <p>
						    	Наиболее распространенной проблемой хомяков считается переедание, а также аллергия, вследствие неправильного питания. Иногда возникают лишаи.
						    </p>
						</div>
					</div>
				</div>
			</div>
		
			<footer style="margin-bottom:0px;">
				<a href="#" class="poleznoe_scrollup"><img src="img/to_top.png"></a>
				
			</footer>
		</div>
	</div>
</body>
</html>