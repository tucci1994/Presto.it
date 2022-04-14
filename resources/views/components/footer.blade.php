<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                                   
                <div class="col-sm-6 col-md-3 item">
                    
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="{{route('welcome')}}">Home</a></li>
                    <li><a href="{{route('showAll')}}">{{__('ui.Tutti gli annunci')}}</a></li>
                    <li><a href="{{route('createAnnouncement')}}">{{__('ui.Inserisci un annuncio')}}</a></li>
                    <li><a href="{{route('contact')}}">{{__('ui.Lavora con noi')}}</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>{{__('ui.Chi siamo')}}</h3>
                    <ul>
                        <li><a href="https://www.linkedin.com/in/fabio-massaro-34926b173/" target="_blank">Fabio Massaro</a></li>
                        <li><a href="https://www.linkedin.com/in/gcastagna-webdeveloper/" target="_blank">Giovanni Castagna</a></li>
                        <li><a href="https://www.linkedin.com/in/lorenzo-masia/" target="_blank">Lorenzo Masia</a></li>
                        <li><a href="https://www.linkedin.com/in/pasquale-dintrono/" target="_blank">Pasquale D'Introno</a></li>
                        <li><a href="https://www.linkedin.com/in/salvatore-tucci-fullstack-developer/" target="_blank">Salvatore Tucci</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3>Team Name</h3>
                    <p>{{__('ui.I rosa elefanti')}}<br><br><strong>{{__('ui.Successivamente riappaiono')}}</strong></p>
                </div>
                <div class="col item social"><a href="#"><i class="fa-brands fa-facebook"></i></a><a href="#"><i class="fa-brands fa-instagram"></i></a><a href="#"><i class="fa-brands fa-twitter"></i></a><a href="#"><i class="fa-brands fa-tiktok"></i></a></div>
            </div>
            <p class="copyright">Rosafanti © 2022 - Aulab.it</p>
            
        </div>
    </footer>
</div>