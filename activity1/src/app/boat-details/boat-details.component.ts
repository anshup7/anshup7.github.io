
import {Boat} from '../../boat';
import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-boat-details',
  templateUrl: './boat-details.component.html',
  styleUrls: ['./boat-details.component.css']
})
export class BoatDetailsComponent implements OnInit {
  @Input()
  dispBoat:Boat[];
  displayDetail:boolean=true;
  updatePrompt:boolean;
  sendingBoatObj:Boat; //Will be a boat obj
  constructor() { }

  modifyDom(boatObj:Boat){
    this.displayDetail = false;
    this.updatePrompt = true;
    this.sendingBoatObj = boatObj;
  }
  ngOnInit() {
  }

}
