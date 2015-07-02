'use strict';

define(function (require) {
    var sandbox = require('sandbox');
    var moment  = require('moment');

    describe('Sandbox', function() {

        // constant
        it('has constants', function () {
            expect(sandbox.constant).toBeDefined();
            expect(sandbox.constant.cutoffHours).toBeDefined();
            expect(sandbox.constant.eventType).toBeDefined();
            expect(sandbox.constant.role).toBeDefined();
        });
        
        // crypto
        it('can crypto', function () {
            expect(sandbox.crypto).toBeDefined();
            expect(sandbox.crypto.encrypt).toBeDefined();
        });
        
        // date
        describe('date', function () {
            it('has dates', function () { 
                expect(sandbox.date).toBeDefined();
                expect(sandbox.date.getDate).toBeDefined();
                expect(sandbox.date.parseUnix).toBeDefined();
                expect(sandbox.date.subHours).toBeDefined();
                expect(sandbox.date.toUnix).toBeDefined();
            });

            it('can getDate', function () {
                var _newDate = new Date('02/11/1991'); 
                expect(sandbox.date.getDate(_newDate).format('M-D-YYYY')).toBe('2-11-1991');
            });

            it('can parseUnix', function () {
                expect(sandbox.date.parseUnix(666259200)).toEqual(moment.unix(666259200));
                expect(sandbox.date.parseUnix(666259200)
                    .format('M-D-YYYY')).toBe('2-11-1991');
            });

            it('can subHours', function () {
                expect(sandbox.date.subHours(666259200, 24)).toBe(666172800);
            });

            it('can toUnix', function () {
                var _now = moment(Date.now()).unix();
                expect(sandbox.date.toUnix()).toEqual(_now);
                expect(sandbox.date.toUnix('02/11/1991'))
                    .toBe(moment(new Date('02/11/1991')).unix());
            });
        });

        // http
        describe('http', function () {
            it('can http', function () { 
                expect(sandbox.http).toBeDefined();
                expect(sandbox.http.get).toBeDefined();
                expect(sandbox.http.post).toBeDefined();
                expect(sandbox.http.put).toBeDefined();
                expect(sandbox.http.delete).toBeDefined();
            });

            it('check for promise callbacks', function () {
                var _get = sandbox.http.get();
                expect(_get.then).toBeDefined();
                expect(_get.catch).toBeDefined();
                expect(_get.done).toBeDefined();
            });
        });
        
        // msg
        it('can msg', function () {
            expect(sandbox.msg).toBeDefined();
            expect(sandbox.msg.subscribe).toBeDefined();
            expect(sandbox.msg.publish).toBeDefined();
            expect(sandbox.msg.dispose).toBeDefined();
        });
        
        // notification
        it('can notify', function () {
            expect(sandbox.notification).toBeDefined();
            expect(sandbox.notification.info).toBeDefined();
            expect(sandbox.notification.success).toBeDefined();
            expect(sandbox.notification.warning).toBeDefined();
            expect(sandbox.notification.error).toBeDefined();
        });
        
        // promise
        it('can promise', function () {
            expect(sandbox.promise).toBeDefined();
            expect(sandbox.promise.defer).toBeDefined();
            expect(sandbox.promise.all).toBeDefined();

        });
        
        // storage
        describe('storage', function () {
            it('can store', function () {
                expect(sandbox.storage).toBeDefined();
                expect(sandbox.storage.read).toBeDefined();
                expect(sandbox.storage.remove).toBeDefined();
                expect(sandbox.storage.set).toBeDefined();
            });

            it('can set a new session value', function () {
                sandbox.storage.set('newCookie', 'newValue');
                expect(window.sessionStorage.newCookie).toBe('newValue');
            });

            it('can read a new session value', function () {
                sandbox.storage.set('newCookie', 'newValue');
                expect(sandbox.storage.read('newCookie')).toBe('newValue');
            });

            it('can remove a session value', function () {
                sandbox.storage.set('newCookie', 'newValue');
                sandbox.storage.remove('newCookie')
                expect(sandbox.storage.read('newCookie')).toBeNull();
            });
        });
        
        // util
        it('has utils', function () {
            expect(sandbox.util).toBeDefined();
            expect(sandbox.util.assign).toBeDefined();
            expect(sandbox.util.clone).toBeDefined();
            expect(sandbox.util.find).toBeDefined();
            expect(sandbox.util.findIndex).toBeDefined();
            expect(sandbox.util.forIn).toBeDefined();
            expect(sandbox.util.template).toBeDefined();
            expect(sandbox.util.nlToBr).toBeDefined();
        });
        
    });
});