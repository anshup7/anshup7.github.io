import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule , ReactiveFormsModule } from '@angular/forms';

//Services
import { LoaderService } from './provider/loader';
import { NotificationService } from './provider/notification';
import { AsyncHttpService } from './provider/async-http.service';

//Components
import { HeaderComponent } from './header/header.component';
import { HomeComponent } from './home/home.component';
import { ProjectComponent } from './project/project.component';
import { AdminComponent } from './admin/admin.component'
import { AppComponent } from './app.component';
import { LoaderComponent } from './loader/loader.component';

//Routing
import { RouterModule, Routes } from '@angular/router';
import { MasterProjectComponent } from './master-project/master-project.component';
import { InvoiceComponent } from './invoice/invoice.component';
import { PurchaseOrderComponent } from './purchase-order/purchase-order.component';
import { ProjectsComponent } from './projects/projects.component';
import { PurchaseOrdersComponent } from './purchase-orders/purchase-orders.component';
import { InvoicesComponent } from './invoices/invoices.component';
import { LoginComponent } from './login/login.component';
import { NotificationComponent } from './notification/notification.component'
import { ProjectCodeComponent } from './project-code/project-code.component';
import { ProjectCodesComponent } from './project-codes/project-codes.component';
import { UsersComponent } from './users/users.component';
import { UserComponent } from './user/user.component';
import { ApprovalComponent } from './approval/approval.component';
import { ConfigurationComponent } from './configuration/configuration.component';
const routes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'projects', component: ProjectsComponent },
  { path: 'projects/:id', component: MasterProjectComponent },
  { path: 'project/:id', component: ProjectComponent },
  { path: 'purchase-order/:id', component: PurchaseOrderComponent },
  { path: 'purchase-order', component: PurchaseOrderComponent },
  { path: 'invoice', component: InvoiceComponent },
  { path: 'invoice/:id', component: InvoiceComponent },
  { path: 'project', component: ProjectComponent },
  { path: 'admin', component: AdminComponent },
  { path: 'login', component: LoginComponent },
  { path: 'index.html', redirectTo: '/login', pathMatch: 'full' },
  { path: '', redirectTo: '/login', pathMatch: 'full' }
];

@NgModule({
  declarations: [
    AppComponent,
    LoaderComponent,
    HeaderComponent,
    HomeComponent,
    ProjectComponent,
    AdminComponent,
    MasterProjectComponent,
    InvoiceComponent,
    NotificationComponent,
    PurchaseOrderComponent,
    ProjectsComponent,
    PurchaseOrdersComponent,
    InvoicesComponent,
    LoginComponent,
    ProjectCodeComponent,
    ProjectCodesComponent,
    UsersComponent,
    UserComponent,
    ApprovalComponent,
    ConfigurationComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    RouterModule.forRoot(routes),
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [LoaderService, NotificationService, AsyncHttpService],
  bootstrap: [AppComponent]
})
export class AppModule { }
