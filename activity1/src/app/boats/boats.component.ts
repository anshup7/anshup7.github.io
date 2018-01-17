import { Component, OnInit } from '@angular/core';
import { Boat } from "C:\\Users\\anshuman.upadhyay\\Desktop\\angular-projects\\activity1\\src\\boat";
import { BoatService } from "../boat.service";
@Component({
  selector: 'app-boats',
  templateUrl: './boats.component.html',
  styleUrls: ['./boats.component.css']
})
export class BoatsComponent implements OnInit {
  
  boatData;
  show:boolean;
  dispBoat:Boat; //To display the update details panel
  source: string = "..\\..\\assets\\houseboat.jpg";
  addRequest:boolean;
  toggle() {
    if(this.show){
      this.show = false;
    } else{
      this.show = true;
    }
  }
  displayBoat(boatObj:Boat){
    this.toggle();
    this.dispBoat = boatObj;
    this.source = boatObj.imageSource;

  }
  constructor(private boatService:BoatService) { }

  ngOnInit() {

    this.boatService.getAllBoats().then(arrayBoats => {this.boatData = arrayBoats});

  }

  addBoat(){
    this.addRequest = this.addRequest ? false : true;
  }


}
