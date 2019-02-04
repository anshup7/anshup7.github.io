import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable()
export class LoaderService {

    private currentNameSubject = new BehaviorSubject({ show: false });

    updateLoader(show: boolean) {
        this.currentNameSubject.next({ show: show });
    }

    getLoader() {
        return this.currentNameSubject;
    }
}

