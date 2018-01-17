import {BoatService} from '../boat.service';
import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators, FormControl } from "@angular/forms";

@Component({
  selector: 'app-add-boat',
  templateUrl: './add-boat.component.html',
  styleUrls: ['./add-boat.component.css']
})
export class AddBoatComponent implements OnInit {

  addBoatForm:FormGroup;

  constructor(private formBuilder:FormBuilder, private BoatService:BoatService) { }

  ngOnInit() {
    this.addBoatForm = this.formBuilder.group({
      boatType: new FormControl('',[Validators.required]),
      boatLocation:['', Validators.required], //Line 17 and 18 both work
      boatBasePrice:['', Validators.required],
      boatAllowedDays:['', Validators.required],
      boatDiscount:['', Validators.required],
      boatDateBooking: ['', Validators.pattern("[0-9][0-9][0-9][0-9]/[0-9][0-9]/[0-9][0-9]/")],
      boatMessage:[''],
      boatImage:['', Validators.required],
      boatDescription:['', Validators.required]
    });
  }

  sendData(){
    this.BoatService.addBoat(this.addBoatForm.value);
  }

}
