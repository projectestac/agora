<?php
defined('MOODLE_INTERNAL') || die;
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<wsdl:definitions xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:tm="http://microsoft.com/wsdl/mime/textMatching/" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:mime="http://schemas.xmlsoap.org/wsdl/mime/" xmlns:tns="http://educacio.gencat.cat/agora/seguimiento/" xmlns:s="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/" xmlns:http="http://schemas.xmlsoap.org/wsdl/http/" targetNamespace="http://educacio.gencat.cat/agora/seguimiento/" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/">
  <wsdl:types>
    <s:schema elementFormDefault="qualified" targetNamespace="http://educacio.gencat.cat/agora/seguimiento/">
    <s:element name="WSEAuthenticateHeader" type="tns:WSEAuthenticateHeader" />
    <s:complexType name="WSEAuthenticateHeader">
    <s:sequence>
      <s:element minOccurs="0" maxOccurs="1" name="User" type="s:string" />
      <s:element minOccurs="0" maxOccurs="1" name="Password" type="s:string" />
    </s:sequence>
    <s:anyAttribute />
    </s:complexType>
    <s:element name="ResultadoDetalleExtendido">
        <s:complexType>
          <s:sequence>
            <s:element minOccurs="0" maxOccurs="1" name="ResultadoExtendido" type="tns:SeguimientoExtendido" />
          </s:sequence>
        </s:complexType>
      </s:element>
      <s:complexType name="SeguimientoExtendido">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="idUsuario" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="idContenidoLMS" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="idCentro" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="idUnidad" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="UnidadTitulo" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="UnidadOrden" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="idActividad" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="ActividadTitulo" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="ActividadOrden" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="ForzarGuardar" type="tns:TipoForzarGuardar" />
          <s:element minOccurs="0" maxOccurs="1" name="Resultado" type="tns:Resultado" />
          <s:element minOccurs="0" maxOccurs="1" name="Detalles" type="tns:ArrayOfDetalleResultado" />
          <s:element minOccurs="0" maxOccurs="1" default="100" name="SumaPesos" type="s:long" />
        </s:sequence>
      </s:complexType>
      <s:simpleType name="TipoForzarGuardar">
        <s:restriction base="s:int">
          <s:enumeration value="0"/>
          <s:enumeration value="1"/>
      </s:restriction>
      </s:simpleType>
      <s:complexType name="Resultado">
        <s:sequence>
          <s:element minOccurs="0" maxOccurs="1" name="FechaHoraInicio" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="Duracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxDuracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" default="0" name="MinCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" name="Calificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" default="100" name="MaxCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" default="1" name="Intentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" default="1" name="MaxIntentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" default="FINALIZADO" name="Estado" type="tns:TipoEstado" />
          <s:element minOccurs="0" maxOccurs="1" name="Observaciones" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="URLVerResultados" type="s:string" />
        </s:sequence>
      </s:complexType>
      <s:simpleType name="TipoEstado">
        <s:restriction base="s:string">
          <s:enumeration value="NO_INICIADO" />
          <s:enumeration value="INCOMPLETO" />
          <s:enumeration value="FINALIZADO" />
          <s:enumeration value="POR_CORREGIR" />
          <s:enumeration value="CORREGIDO" />
        </s:restriction>
      </s:simpleType>
      <s:simpleType name="TipoDetalle">
        <s:restriction base="s:string">
          <s:enumeration value="PREGUNTA" />
          <s:enumeration value="COMPETENCIA" />
        </s:restriction>
      </s:simpleType>
      <s:complexType name="ArrayOfDetalleResultado">
        <s:sequence>
          <s:element minOccurs="0" maxOccurs="unbounded" name="DetalleResultado" nillable="true" type="tns:DetalleResultado" />
        </s:sequence>
      </s:complexType>
      <s:complexType name="DetalleResultado">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="IdDetalle" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="IdTipoDetalle" type="tns:TipoDetalle" />
          <s:element minOccurs="1" maxOccurs="1" name="Descripcion" type="s:string" />
          <s:element minOccurs="0" maxOccurs="1" name="FechaHoraInicio" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="Duracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxDuracion" type="s:long" />
          <s:element minOccurs="0" maxOccurs="1" name="MinCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" name="Calificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxCalificacion" type="s:double" />
          <s:element minOccurs="0" maxOccurs="1" name="Intentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" name="MaxIntentos" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" default="1" name="Peso" type="s:int" />
          <s:element minOccurs="0" maxOccurs="1" name="URLVerResultados" type="s:string" />
        </s:sequence>
      </s:complexType>
      <s:element name="ResultadoDetalleExtendidoResponse">
        <s:complexType>
          <s:sequence>
            <s:element minOccurs="0" maxOccurs="1" name="ResultadoDetalleExtendidoResult" type="tns:RespuestaResultadoExtendido" />
          </s:sequence>
        </s:complexType>
      </s:element>
      <s:complexType name="RespuestaResultadoExtendido">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="Resultado" type="tns:TipoResultado" />
          <s:element minOccurs="0" maxOccurs="1" name="DetalleError" type="tns:TipoDetalleError" />
        </s:sequence>
      </s:complexType>
      <s:simpleType name="TipoResultado">
        <s:restriction base="s:string">
          <s:enumeration value="OK" />
          <s:enumeration value="KO" />
        </s:restriction>
      </s:simpleType>
      <s:complexType name="TipoDetalleError">
        <s:sequence>
          <s:element minOccurs="1" maxOccurs="1" name="Codigo" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="Descripcion" type="s:string" />
          <s:element minOccurs="1" maxOccurs="1" name="Observaciones" type="s:string" />
        </s:sequence>
      </s:complexType>
    </s:schema>
  </wsdl:types>
  <wsdl:message name="ResultadoDetalleExtendidoWSEAuthenticateHeader">
    <wsdl:part name="WSEAuthenticateHeader" element="tns:WSEAuthenticateHeader" />
  </wsdl:message>
  <wsdl:message name="ResultadoDetalleExtendidoSoapIn">
    <wsdl:part name="parameters" element="tns:ResultadoDetalleExtendido" />
  </wsdl:message>
  <wsdl:message name="ResultadoDetalleExtendidoSoapOut">
    <wsdl:part name="parameters" element="tns:ResultadoDetalleExtendidoResponse" />
  </wsdl:message>
  <wsdl:portType name="SeguimientoSoap">
    <wsdl:operation name="ResultadoDetalleExtendido">
      <wsdl:input message="tns:ResultadoDetalleExtendidoSoapIn" />
      <wsdl:output message="tns:ResultadoDetalleExtendidoSoapOut" />
    </wsdl:operation>
  </wsdl:portType>
  <wsdl:binding name="SeguimientoSoap" type="tns:SeguimientoSoap">
    <soap:binding transport="http://schemas.xmlsoap.org/soap/http" />
    <wsdl:operation name="ResultadoDetalleExtendido">
      <soap:operation soapAction="http://educacio.gencat.cat/agora/seguimiento/ResultadoDetalleExtendido" style="document" />
      <wsdl:input>
        <soap:body use="literal" />
        <soap:header message="tns:ResultadoDetalleExtendidoWSEAuthenticateHeader" part="WSEAuthenticateHeader" use="literal" />
      </wsdl:input>
      <wsdl:output>
        <soap:body use="literal" />
      </wsdl:output>
    </wsdl:operation>
  </wsdl:binding>
  <wsdl:binding name="SeguimientoSoap12" type="tns:SeguimientoSoap">
    <soap12:binding transport="http://schemas.xmlsoap.org/soap/http" />
    <wsdl:operation name="ResultadoDetalleExtendido">
      <soap12:operation soapAction="http://educacio.gencat.cat/agora/seguimiento/ResultadoDetalleExtendido" style="document" />
      <wsdl:input>
        <soap12:body use="literal" />
        <soap12:header message="tns:ResultadoDetalleExtendidoWSEAuthenticateHeader" part="WSEAuthenticateHeader" use="literal" />
      </wsdl:input>
      <wsdl:output>
        <soap12:body use="literal" />
      </wsdl:output>
    </wsdl:operation>
  </wsdl:binding>
  <wsdl:service name="Seguimiento">
    <wsdl:port name="SeguimientoSoap" binding="tns:SeguimientoSoap">
      <soap:address location="<?php echo $CFG->wwwroot;?>/mod/rcontent/WebServices/wsSeguimiento.php" />
    </wsdl:port>
    <wsdl:port name="SeguimientoSoap12" binding="tns:SeguimientoSoap12">
      <soap12:address location="<?php echo $CFG->wwwroot;?>/mod/rcontent/WebServices/wsSeguimiento.php" />
    </wsdl:port>
  </wsdl:service>
</wsdl:definitions>