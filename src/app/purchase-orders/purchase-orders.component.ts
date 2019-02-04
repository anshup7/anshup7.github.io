import { Component, OnInit, Output, Input, EventEmitter } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { AsyncHttpService } from "../provider/async-http.service";
import { Router } from '@angular/router';
import { LoaderService } from "src/app/provider/loader";

@Component({
  selector: 'app-purchase-orders',
  templateUrl: './purchase-orders.component.html',
  styleUrls: ['./purchase-orders.component.css']
})
export class PurchaseOrdersComponent implements OnInit {
  projects: any;
  @Input() projectID: any;
  @Output() emitter: EventEmitter<any> = new EventEmitter();

  constructor(private service: AsyncHttpService, private activatedRoute: ActivatedRoute, private router: Router, private loader: LoaderService) { }

  ngOnInit() {
    this.activatedRoute.params.subscribe(params => {
      console.log(params);
      if (params.id) this.service.get('http://192.168.216.48:8080/protracker/app/api/po/'+this.projectID).subscribe(data => {
        this.projects = data.content;
        console.log("POs", this.projects)
      })
    })
  }



  editPO(id) {
    this.emitter.emit({ event: 'PO-CREATE', id: id });
  }

  createPO() {
    this.emitter.emit({ event: 'PO-CREATE', id: '' });
  }

}
