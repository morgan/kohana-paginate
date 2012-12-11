# 0.3.0 - 12/10/2012

- Added support for [ORM-REST](https://github.com/morgan/kohana-orm-rest) module along with unit 
test coverage
- Upgraded to support Kohana 3.3
- Renamed class files and directories to support PSR-0
- Resolved pass by reference issue (now testing in strict mode)
- Updated user guide documentation
- All tests pass: "OK (8 tests, 20 assertions)"

# 0.2.0 - 09/01/2012

- Added ability to derive total count for search result (count prior to paging)
- Resolves issue #2 https://github.com/morgan/kohana-paginate/issues/2
- `Paginate::search` now a getter/setter for search query
- All tests pass: "OK (6 tests, 15 assertions)"

# 0.1.0 - 06/02/2012

- Initial release of Paginate
- Support for Kohana Database, Kohana ORM and REST (via Dispatch)
- Shipped with separate wrapper for DataTables
- All tests pass: "OK (6 tests, 12 assertions)"
