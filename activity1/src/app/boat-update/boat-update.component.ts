import {BoatService} from '../boat.service';
import {Boat} from '../../boat';
import { Component, OnInit , Input} from '@angular/core';


@Component({
  selector: 'app-boat-update',
  templateUrl: './boat-update.component.html',
  styleUrls: ['./boat-update.component.css']
})
export class BoatUpdateComponent implements OnInit {
  @Input()
  updateableBoatDetail:Boat;  //Whenever a component is loaded, first it's constructor is called, then onInit()
  sendingBoatDetail:Boat;
  message:any;
  showMessage:boolean;
  @Input()
  showForm:boolean;
  constructor(private boatService:BoatService) { }
 
  ngOnInit() {
    this.sendingBoatDetail = new Boat();
    this.sendingBoatDetail.boatId = this.updateableBoatDetail.boatId;
    this.sendingBoatDetail.boatType = this.updateableBoatDetail.boatType
    this.sendingBoatDetail.location = this.updateableBoatDetail.location;
    this.sendingBoatDetail.dateBooking = this.updateableBoatDetail.dateBooking;
    this.sendingBoatDetail.basePrice = this.updateableBoatDetail.basePrice;
    this.sendingBoatDetail.allowedDays = this.updateableBoatDetail.allowedDays;
    this.sendingBoatDetail.discount = this.updateableBoatDetail.discount;
    this.sendingBoatDetail.message = this.updateableBoatDetail.message;
    this.sendingBoatDetail.imageSource = this.updateableBoatDetail.imageSource;
    this.sendingBoatDetail.description = this.updateableBoatDetail.description;
  }
  
 

  onSubmit(){
    this.boatService.updateBoat(this.sendingBoatDetail).then(res => this.message = res); //this is returning a promise
    this.showMessage = true;
  }

}
