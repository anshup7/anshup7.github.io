import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { catchError, map, tap, finalize } from 'rxjs/operators';
import { Router } from '@angular/router';
import { NotificationService } from "../provider/notification";

//Services
import { LoaderService } from './loader';


@Injectable({
  providedIn: 'root'
})
export class AsyncHttpService {

  constructor(private httpClient: HttpClient, private loader: LoaderService, private notification: NotificationService) { }

  get(url: string, options?: Object): Observable<any> {
    this.loader.updateLoader(true);
    return this.httpClient.get(url, options)
      .pipe(
      catchError(this.handleError(url))
      ).pipe(
      finalize(() => this.loader.updateLoader(false))
      );
  }

  post(url: string, data: Object, options?: Object): Observable<any> {
    this.loader.updateLoader(true);
    return this.httpClient.post(url, data, options)
      .pipe(
      catchError(this.handleError(url))
      ).pipe(
      finalize(() => this.loader.updateLoader(false))
      );
  }

  put(url: string, data: Object, options?: Object): Observable<any> {
    this.loader.updateLoader(true);
    return this.httpClient.put(url, data, options)
      .pipe(
      catchError(this.handleError(url))
      ).pipe(
      finalize(() => this.loader.updateLoader(false))
      );
  }

  delete(url: string, options?: Object): Observable<any> {
    this.loader.updateLoader(true);
    return this.httpClient.delete(url, options)
      .pipe(
      catchError(this.handleError(url))
      ).pipe(
      finalize(() => this.loader.updateLoader(false))
      );
  }

  private handleError<T>(url = 'url', result?: T) {
    return (error: any): Observable<T> => {
      console.error(error);
      return of(result);
    };
  }
}
