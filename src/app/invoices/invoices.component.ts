import { Component, OnInit, Output, Input, EventEmitter } from '@angular/core';
import { AsyncHttpService } from "../provider/async-http.service";
import { Router } from '@angular/router';

@Component({
  selector: 'app-invoices',
  templateUrl: './invoices.component.html',
  styleUrls: ['./invoices.component.css']
})
export class InvoicesComponent implements OnInit {

  invoices: any[];
  @Input() projectID: any;
  @Output() emitter: EventEmitter<any> = new EventEmitter();

  constructor(private service: AsyncHttpService, private router: Router) { }

  ngOnInit() {
    this.service.get('http://192.168.216.48:8080/protracker/app/api/invoice/'+this.projectID).subscribe(data => {
      this.invoices = data.content;
    })
  }

  editPO(id) {
    this.emitter.emit({ event: 'IN-CREATE', id: id });
  }

  createPO() {
    this.emitter.emit({ event: 'IN-CREATE', id: '' });
  }
}
