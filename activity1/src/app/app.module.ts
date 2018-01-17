import {HttpModule} from '@angular/http';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { BoatsComponent } from './boats/boats.component';
import { BoatService } from "./boat.service";
import { BoatDetailsComponent } from './boat-details/boat-details.component';
import { BoatUpdateComponent } from './boat-update/boat-update.component';
import { AddBoatComponent } from './add-boat/add-boat.component';


@NgModule({
  declarations: [
    AppComponent,
    BoatsComponent,
    BoatDetailsComponent,
    BoatUpdateComponent,
    AddBoatComponent
    
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [BoatService],
  bootstrap: [AppComponent]
})
export class AppModule { }
