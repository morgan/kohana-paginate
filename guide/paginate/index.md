# Paginate Module

A paginate abstraction supporting Database, ORM, ORM-REST and Dispatch.

## Getting Started

Paginate module provides for a common interface for sorting, searching and limiting collections. 
Current driver support includes [Database](https://github.com/kohana/database), 
[ORM](https://github.com/kohana/orm), [ORM-REST](https://github.com/morgan/kohana-orm-rest) and 
[Dispatch](https://github.com/morgan/kohana-dispatch). Implementation is as simple as 
passing a supported object into `Paginate::factory`. [Read More](basics).

## Wrappers

The module is useful by itself or when used in conjunction with a wrapper. Below is a list of 
known wrappers:

- [DataTables](https://github.com/morgan/kohana-datatables) - The ever so popular table 
plug-in for jQuery hosted at [http://datatables.net/](http://datatables.net/).

## Additional Resources

- API Browser
- Unit Tests
