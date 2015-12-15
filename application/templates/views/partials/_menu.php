<div class="page-header <?= ($params['isMain']) ? "page-header--index" : "" ?>">
    <a href="#" class="menu-btn">
        <span class="burger-icon"></span>
    </a>
    <div class="top-logo"></div>
    <nav class="top-nav">
        <a href="<?=$params['urlMenu']?>#top" class="top-nav__item <?=($params['isMain']) ? 'active' : ''?> scroll">4gтакси</a>
        <a href="<?=$params['urlMenu']?>#smartphone" class="top-nav__item scroll">4gсмартфоны</a>
        <a href="<?=$params['urlMenu']?>#questions" class="top-nav__item scroll">Все о 4G</a>
        <a href="/shares" class="top-nav__item <?=$params['isShare'] ? 'active' : ''?>">4Gакции</a>
    </nav>
    <div class="top-socials">

        <a href="#" class="vk" onclick="Share.vkontakte('<?=$params['host']?>','Хочу прокатиться на #4GтаксиМТС!','http://img0.joyreactor.cc/pics/post/full/anon-%D0%9A%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B0-2191131.jpeg','Придумайте повод и получите шанс прокатиться на #4GтаксиМТС!')">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 532.337 532.337" xml:space="preserve">
									<path d="M471.998,241.286c7.57-9.786,13.58-17.638,18.018-23.562c31.965-42.498,45.82-69.646,41.574-81.482l-1.666-2.772
									c-1.107-1.665-3.977-3.194-8.592-4.578c-4.621-1.383-10.533-1.604-17.736-0.691l-79.822,0.563
									c-1.848-0.184-3.697-0.141-5.545,0.128c-1.848,0.281-3.047,0.563-3.605,0.832c-0.557,0.282-1.016,0.508-1.383,0.692l-1.107,0.832
									c-0.924,0.551-1.939,1.524-3.047,2.914c-1.109,1.389-2.039,2.999-2.773,4.853c-8.684,22.356-18.568,43.146-29.656,62.363
									c-6.838,11.457-13.123,21.396-18.844,29.792c-5.729,8.415-10.533,14.603-14.414,18.568c-3.879,3.972-7.393,7.166-10.531,9.56
									c-3.146,2.411-5.545,3.421-7.203,3.054c-1.666-0.367-3.238-0.734-4.713-1.114c-2.588-1.658-4.67-3.917-6.236-6.787
									c-1.572-2.857-2.631-6.463-3.189-10.808c-0.551-4.339-0.881-8.084-0.967-11.23c-0.098-3.139-0.049-7.57,0.141-13.305
									c0.184-5.729,0.275-9.602,0.275-11.64c0-7.014,0.141-14.639,0.418-22.864c0.275-8.219,0.508-14.737,0.691-19.542
									c0.184-4.798,0.275-9.884,0.275-15.245c0-5.349-0.324-9.56-0.975-12.613c-0.648-3.042-1.621-5.998-2.906-8.868
									c-1.297-2.858-3.189-5.08-5.686-6.646c-2.496-1.573-5.588-2.815-9.283-3.746c-9.799-2.222-22.271-3.409-37.418-3.604
									c-34.37-0.355-56.451,1.86-66.243,6.658c-3.88,2.038-7.393,4.804-10.532,8.317c-3.329,4.07-3.788,6.291-1.383,6.646
									c11.089,1.665,18.936,5.643,23.556,11.922l1.665,3.323c1.291,2.411,2.583,6.659,3.88,12.754c1.292,6.096,2.124,12.84,2.497,20.233
									c0.924,13.488,0.924,25.031,0,34.646c-0.924,9.614-1.799,17.093-2.631,22.442c-0.833,5.361-2.081,9.7-3.74,13.023
									c-1.665,3.335-2.772,5.367-3.329,6.107c-0.557,0.734-1.016,1.199-1.383,1.384c-2.405,0.918-4.896,1.383-7.484,1.383
									c-2.589,0-5.729-1.298-9.425-3.887c-3.697-2.576-7.534-6.138-11.5-10.667c-3.978-4.522-8.452-10.856-13.446-18.99
									c-4.988-8.121-10.166-17.736-15.521-28.819l-4.431-8.042c-2.772-5.165-6.561-12.699-11.365-22.583s-9.058-19.443-12.748-28.69
									c-1.481-3.874-3.697-6.83-6.652-8.868l-1.383-0.832c-0.924-0.735-2.405-1.524-4.437-2.351c-2.038-0.832-4.155-1.432-6.377-1.805
									l-75.943,0.551c-7.76,0-13.023,1.763-15.795,5.275l-1.108,1.659C0.275,136.059,0,137.54,0,139.566
									c0,2.038,0.557,4.529,1.665,7.479c11.089,26.059,23.146,51.188,36.169,75.386c13.03,24.211,24.346,43.709,33.954,58.489
									c9.608,14.792,19.4,28.733,29.382,41.854c9.982,13.121,16.585,21.523,19.816,25.214c3.231,3.703,5.771,6.476,7.62,8.317
									l6.928,6.658c4.431,4.432,10.949,9.743,19.542,15.937c8.592,6.193,18.103,12.289,28.55,18.287
									c10.435,6.01,22.589,10.899,36.444,14.694c13.856,3.794,27.344,5.317,40.465,4.571h31.874c6.469-0.551,11.363-2.576,14.688-6.096
									l1.107-1.383c0.734-1.102,1.432-2.815,2.08-5.123c0.643-2.307,0.975-4.853,0.975-7.619c-0.191-7.943,0.416-15.116,1.799-21.481
									c1.383-6.377,2.955-11.175,4.713-14.418c1.756-3.226,3.738-5.955,5.959-8.177c2.217-2.222,3.783-3.55,4.713-4.015
									c0.924-0.453,1.666-0.777,2.217-0.973c4.43-1.476,9.65-0.043,15.66,4.296c6.004,4.352,11.641,9.7,16.91,16.077
									c5.262,6.377,11.59,13.531,18.984,21.481c7.387,7.943,13.855,13.855,19.4,17.735l5.545,3.336
									c3.695,2.209,8.494,4.241,14.412,6.096c5.912,1.842,11.09,2.307,15.52,1.383l70.955-1.114c7.02,0,12.473-1.15,16.354-3.464
									c3.879-2.295,6.188-4.853,6.928-7.619c0.734-2.772,0.783-5.899,0.141-9.419c-0.648-3.507-1.297-5.955-1.939-7.338
									c-0.648-1.383-1.25-2.546-1.807-3.464c-9.24-16.628-26.885-37.051-52.938-61.255l-0.557-0.551l-0.275-0.281l-0.275-0.27H473.4
									c-11.83-11.273-19.309-18.85-22.449-22.736c-5.727-7.38-7.025-14.865-3.879-22.441
									C449.275,271.874,457.586,259.769,471.998,241.286z"/>
								</svg>
        </a>
        <a href="#" class="fb" onclick="shareFBMain()">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 96.124 96.123" xml:space="preserve">
									<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
										c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
										c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
										c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/>
								</svg>
        </a>
        <a href="#" class="twitter" onclick="Share.twitter('<?=$params['host']?>','Хочу прокатиться на #4GтаксиМТС!')">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 612 612" xml:space="preserve">
									<path d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411
									c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513
									c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101
									c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104
									c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194
									c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485
									c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z"/>
								</svg>
        </a>
    </div>
</div>