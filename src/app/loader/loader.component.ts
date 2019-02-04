import { Component, OnInit } from '@angular/core';
import { LoaderService } from '../provider/loader'
@Component({
  selector: 'app-loader',
  templateUrl: './loader.component.html',
  styleUrls: ['./loader.component.css']
})
export class LoaderComponent implements OnInit {

  show: boolean = false;

  constructor(private loader: LoaderService) { }

  ngOnInit() {
    this.loader.getLoader().subscribe(data => {
      this.show = data.show;
    })
  }

}
